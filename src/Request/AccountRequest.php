<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Response;
use InstagramFollowers\Response\UserInfoResponse;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

/**
 * Class AccountRequest
 * @package InstagramFollowers\Request
 */
class AccountRequest {
    use ClientTrait;
    use SignDataTrait;

    /**
     * @var $contactPointPrefillResponse Response|null
     */
    public $contactPointPrefillResponse = null;
    /**
     * @var $fetch_configResponse Response|null
     */
    public $fetch_configResponse = null;
    /**
     * @var $getPrefillCandidatesResponse Response\PrefillsResponse|Response|null
     */
    public $getPrefillCandidatesResponse = null;
    /**
     * @var $process_contact_point_signals_response Response|null
     */
    public $process_contact_point_signals_response = null;
    /**
     * @var $loginResponse Response\LoginResponse|null
     */
    public $loginResponse = null;

    /**
     * @param string $mobile_subno_usage
     * @return bool|Response
     */
    public function contactPointPrefill($mobile_subno_usage = 'prefill') {
        $data = [
            'phone_id' => $this->client->getPhoneId(),
            '_csrftoken' => $this->client->get_csrt_token(),
            'usage' => $mobile_subno_usage

        ];
        $this->contactPointPrefillResponse = $this->client->request("/accounts/contact_point_prefill/", Response::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->contactPointPrefillResponse;
    }

    /**
     * @return bool|Response
     */
    public function process_contact_point_signals() {
        $data = [
            'phone_id' => $this->client->getPhoneId(),
            'sim_phone_number' => "",
            '_csrftoken' => $this->client->get_csrt_token(),
            '_uid' => $this->getClient()->get_cookie_from_name('ds_user_id'),
            'device_id' => $this->getClient()->getDeviceId(),
            '_uuid' => $this->getClient()->getDeviceId(),
            'google_tokens' => '[]',

        ];
        $this->process_contact_point_signals_response = $this->client->request("/accounts/process_contact_point_signals/", Response::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->process_contact_point_signals_response;
    }

    /**
     * @return bool|Response
     */
    public function fetch_config() {
        $this->fetch_configResponse = $this->client->request("/loom/fetch_config/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->fetch_configResponse;
    }

    /**
     * @return bool|Response|Response\PrefillsResponse
     */
    public function getPrefillCandidates() {
        $data = [
            'android_device_id' => $this->client->getAndroidId(),
            'client_contact_points' => "[]",
            'phone_id' => $this->client->getPhoneId(),
            'usages' => '["account_recovery_omnibox"]',
            '_csrftoken' => $this->client->get_csrt_token(),
            'device_id' => $this->client->getDeviceId()
        ];
        $this->getPrefillCandidatesResponse = $this->client->request("/accounts/get_prefill_candidates/", Response::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->getPrefillCandidatesResponse;


    }


    /**
     * @var $remove_profile_picture_response null|UserInfoResponse
     */
    public $remove_profile_picture_response;

    /**
     * @return bool|Response|UserInfoResponse
     */
    public function remove_profile_picture() {
        $data = [
            "_csrftoken" => $this->getClient()->get_csrt_token(),
            "_uid" => $this->getClient()->get_cookie_from_name('ds_user_id'),
            "_uuid" => $this->getClient()->getDeviceId()
        ];
        $this->remove_profile_picture_response = $this->client->request("/accounts/remove_profile_picture/", UserInfoResponse::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->remove_profile_picture_response;


    }

    /**
     * @var $remove_profile_picture_response null|UserInfoResponse
     */
    public $change_profile_picture_response;

    /**
     * @param $upload_id string
     *
     * @return bool|Response|UserInfoResponse
     */
    public function change_profile_picture($upload_id) {
        $this->change_profile_picture_response = $this->client->request("/accounts/change_profile_picture/", UserInfoResponse::class)
            ->needAuthorization(false)
            ->addParam("_csrftoken", $this->getClient()->get_csrt_token())
            ->addParam("_uuid", $this->getClient()->getDeviceId())
            ->addParam("use_fbuploader", true)
            ->addParam("upload_id", $upload_id)
            ->post();
        return $this->change_profile_picture_response;

    }

    /**
     * @deprecated
     *
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     */
    public function login_deprecated($username, $password) {
        $this->loginResponse = $this->client->request("/accounts/login/", Response\LoginResponse::class)
            ->needAuthorization(false)
            ->addParam('country_codes', '[{"country_code":"1","source":["default"]}]')
            ->addParam('phone_id', $this->client->getPhoneId())
            ->addParam('_csrftoken', $this->client->get_csrt_token())
            ->addParam('username', $username)
            ->addParam('adid', $this->client->getAdvertisingId())
            ->addParam('guid', $this->client->getDeviceId())
            ->addParam('device_id', $this->client->getAndroidId())
            ->addParam('password', $password)
            ->addParam('google_tokens', '[]')
            ->addParam('login_attempt_count', 0)
            ->post();

        return $this->loginResponse;
    }

    /**
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     */
    public function login($username, $password) {
        $data = [
            "jazoest" => "22318",
            "country_codes" => '[{"country_code":"1","source":["default"]}]',
            "phone_id" => $this->client->getPhoneId(),
            "enc_password" => $this->generate_password_enc($password, $this->getClient()->getPasswordEncPubKey(), $this->getClient()->getPasswordPubKeyId()),
            "_csrftoken" => $this->client->get_csrt_token(),
            "username" => $username,
            "adid" => $this->client->getAdvertisingId(),
            "guid" => $this->client->getDeviceId(),
            "device_id" => $this->client->getAndroidId(),
            "google_tokens" => "[]",
            "login_attempt_count" => "0"
        ];
        $this->loginResponse = $this->client->request("/accounts/login/", Response\LoginResponse::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->loginResponse;

    }

    /**
     * @param $verification_code string
     * @param $two_factor_identifier string
     * @param $username string
     *
     * @return bool|Response|Response\LoginResponse
     */
    public function two_factor_login($verification_code, $two_factor_identifier, $username) {
        $data = [
            "verification_code" => $verification_code,
            "phone_id" => $this->getClient()->getPhoneId(),
            "_csrftoken" => $this->getClient()->get_csrt_token(),
            "two_factor_identifier" => $two_factor_identifier,
            "username" => $username,
            "trust_this_device" => "0",
            "guid" => $this->getClient()->getDeviceId(),
            "device_id" => $this->getClient()->getAndroidId(),
            "verification_method" => "1"
        ];
        $this->loginResponse = $this->client->request("/accounts/two_factor_login/", Response\LoginResponse::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->loginResponse;

    }

    protected function generate_password_enc($password_raw, $public_key, $public_key_id) {
        $formatString = "%s:%s:%s:%s";
        $PWD_INSTAGRAM = "#PWD_INSTAGRAM";
        $gen4 = 4;
        $timeInMillis = time();
        $password_enc = $this->_encrypt($public_key, $public_key_id, $password_raw, $timeInMillis);

        return sprintf($formatString, $PWD_INSTAGRAM, $gen4, $timeInMillis, $password_enc);
    }

    protected function _encrypt($public_key, $public_key_id, $password_raw, $timeInMillis) {
        $key = openssl_random_pseudo_bytes(32);
        $iv = openssl_random_pseudo_bytes(12);

        openssl_public_encrypt($key, $encryptedAesKey, base64_decode($public_key));
        $encrypted = openssl_encrypt($password_raw, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag, strval($timeInMillis));

        return base64_encode("\x01" | pack('n', intval($public_key_id)) . $iv . pack('s', strlen($encryptedAesKey)) . $encryptedAesKey . $tag . $encrypted);

    }
}
