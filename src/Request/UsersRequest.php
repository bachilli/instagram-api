<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Response\UserInfoResponse;
use InstagramFollowers\Traits\ClientTrait;

class UsersRequest {
    use ClientTrait;
    /**
     * @var $arlink_download_info_response Response|null
     */
    public $arlink_download_info_response = null;
    /**
     * @var $user_info_response Response|null
     */
    public $user_info_response = null;
    /**
     * @var $getInfoByNameResponse UserInfoResponse|Response|null
     */
    public $getInfoByNameResponse = null;

    public function arlink_download_info() {
        $this->arlink_download_info_response = $this->client->request("/users/arlink_download_info/", Response::class)
            ->needAuthorization(true)
            ->addParam('version_override', "2.2.1")
            ->get();
        return $this->arlink_download_info_response;
    }

    public function user_info($user_id) {
        $this->user_info_response = $this->client->request("/users/$user_id/info/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->user_info_response;
    }

    public function getInfoByName($username){
        $this->getInfoByNameResponse = $this->client->request("/users/$username/usernameinfo/", UserInfoResponse::class)
            ->needAuthorization(true)
            ->get();
        return $this->getInfoByNameResponse;
    }

}
