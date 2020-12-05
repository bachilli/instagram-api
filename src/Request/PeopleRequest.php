<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Response;
use InstagramFollowers\Response\FriendshipsShowManyResponse;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

class PeopleRequest {
    use ClientTrait;
    use SignDataTrait;
    /**
     * @var $create_friendship_last_response Response\FriendshipResponse|null
     */
    public $create_friendship_last_response = null;

    /**
     * @var $shop_many_friendships_response Response|FriendshipsShowManyResponse|null
     */
    public $shop_many_friendships_response = null;

    /**
     * @param $user_pk string
     *
     * @return bool|Response|Response\FriendshipResponse
     */
    public function create_friendship($user_pk) {
        $data = [
            '_csrftoken' => $this->client->get_csrt_token(),
            'user_id' => $user_pk,
            'radio_type' => "wifi-none",
            '_uid' => $this->getClient()->get_cookie_from_name('ds_user_id'),
            'device_id' => $this->client->getAndroidId(),
            '_uuid' => $this->client->getDeviceId(),

        ];
        $this->create_friendship_last_response = $this->client->request('/friendships/create/' . $user_pk . '/', Response\FriendshipResponse::class)
            ->needAuthorization(true)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->create_friendship_last_response;

    }

    /**
     * @param $user_ids array example: ["01234567890","01234567890","01234567890","01234567890"]
     *
     * @return bool|Response|FriendshipsShowManyResponse
     */
    public function show_many_friendships($user_ids) {
        $this->shop_many_friendships_response = $this->client->request('/friendships/show_many/', Response\FriendshipsShowManyResponse::class)
            ->needAuthorization(true)
            ->addParam('_csrftoken', $this->getClient()->get_csrt_token())
            ->addParam('user_ids', implode(',', $user_ids))
            ->addParam('_uuid', $this->getClient()->getDeviceId())
            ->post();
        return $this->shop_many_friendships_response;

    }

    /**
     * $add or $remove are array of user PKs
     *
     * @param $remove array
     * @param $add array
     *
     * @return bool|Response|FriendshipsShowManyResponse|Response
     */
    protected function set_besties($remove = [], $add = []) {
        $data = [
            "block_on_empty_thread_creation" => "false",
            "module" => "CLOSE_FRIENDS_V2_SEARCH",
            "source" => "audience_manager",
            "_csrftoken" => $this->getClient()->get_csrt_token(),
            "_uid" => $this->getClient()->get_cookie_from_name('ds_user_id'),
            "_uuid" => $this->getClient()->getDeviceId(),
            "remove" => $remove,
            "add" => $add,

        ];
        $dataStr = json_encode($data);
        return $this->client->request('/friendships/set_besties/', Response\FriendshipsShowManyResponse::class)
            ->needAuthorization(true)
            ->addParam('signed_body', $this->generateSigned_body($dataStr))
            ->addParam('ig_sig_key_version', InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
    }

    /**
     * @var $add_best_friend_Response FriendshipsShowManyResponse|Response|null
     */
    public $add_best_friend_Response = null;

    /**
     * Add best friend
     *
     * Here you can pass one User pk or more in an array
     * like [0123485789,0123456789,01263456789]
     *
     * @param $user_pks int|array
     *
     * @return FriendshipsShowManyResponse
     */
    public function add_best_friend($user_pks) {
        if (is_array($user_pks) === true) {
            $this->add_best_friend_Response = $this->set_besties([], $user_pks);
        } else {
            $this->add_best_friend_Response = $this->set_besties([], [$user_pks]);
        }
        return $this->add_best_friend_Response;
    }


    /**
     * @var $delete_best_friend_Response Response\GetBestiesResponse|Response|null
     */
    public $get_besties_response = null;

    /**
     * @return bool|Response|Response\GetBestiesResponse
     */
    public function get_besties() {
        $this->get_besties_response = $this->client->request('/friendships/besties/', Response\GetBestiesResponse::class)
            ->needAuthorization(true)
            ->get();
        return $this->get_besties_response;
    }

    /**
     * @var $delete_best_friend_Response Response\GetBestiesResponse|Response|null
     */
    public $get_bestie_suggestions_response = null;

    public function get_bestie_suggestions() {
        $this->get_bestie_suggestions_response = $this->client->request('/friendships/bestie_suggestions/', Response\GetBestiesResponse::class)
            ->needAuthorization(true)
            ->get();
        return $this->get_bestie_suggestions_response;
    }

    /**
     * @var $delete_best_friend_Response FriendshipsShowManyResponse|Response|null
     */
    public $delete_best_friend_Response = null;

    /**
     * Add best friend
     *
     * Here you can pass one User pk or more in an array
     * like [0123485789,0123456789,01263456789]
     *
     * @param $user_pks int|array
     *
     * @return FriendshipsShowManyResponse
     */
    public function delete_best_friend($user_pks) {
        if (is_array($user_pks) === true) {
            $this->delete_best_friend_Response = $this->set_besties($user_pks, []);
        } else {
            $this->delete_best_friend_Response = $this->set_besties([$user_pks], []);
        }
        return $this->delete_best_friend_Response;
    }
}
