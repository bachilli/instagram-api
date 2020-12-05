<?php

namespace InstagramFollowers;

use InstagramFollowers\Interfaces\CookiesStorageInterface;
use InstagramFollowers\Repositories\AuthorizationStorageRepository;
use InstagramFollowers\Repositories\CookiesStorageRepository;
use InstagramFollowers\Request\AccountRequest;
use InstagramFollowers\Request\BanyanRequest;
use InstagramFollowers\Request\BusinessRequest;
use InstagramFollowers\Request\CreativesRequest;
use InstagramFollowers\Request\Direct_v2Request;
use InstagramFollowers\Request\DiscoverRequest;
use InstagramFollowers\Request\FeedRequest;
use InstagramFollowers\Request\LauncherRequest;
use InstagramFollowers\Request\MediaRequest;
use InstagramFollowers\Request\MultipleAccountsRequest;
use InstagramFollowers\Request\NewsRequest;
use InstagramFollowers\Request\NotificationsRequest;
use InstagramFollowers\Request\PeopleRequest;
use InstagramFollowers\Request\QERequest;
use InstagramFollowers\Request\QPRequest;
use InstagramFollowers\Request\ScoresRequest;
use InstagramFollowers\Request\StatusRequest;
use InstagramFollowers\Request\UsersRequest;

class Instagram extends Client {

    /**
     * @var $AccountRequest AccountRequest
     */
    public $accountRequest;

    /**
     * @var $LauncherRequest LauncherRequest
     */
    public $launcherRequest;

    /**
     * @var $QERequest QERequest
     */
    public $qERequest;

    /**
     * @var $qPRequest QPRequest
     */
    public $qPRequest;

    /**
     * @var $people PeopleRequest
     */
    public $people;
    /**
     * @var $multipleAccounts MultipleAccountsRequest
     */
    public $multipleAccounts;

    /**
     * @var $banyanRequest BanyanRequest
     */
    public $banyanRequest;

    /**
     * @var $feedRequest FeedRequest
     */
    public $feedRequest;
    /**
     * @var $newsRequest NewsRequest
     */
    public $newsRequest;
    /**
     * @var $mediaRequest MediaRequest
     */
    public $mediaRequest;
    /**
     * @var $businessRequest BusinessRequest
     */
    public $businessRequest;
    /**
     * @var $scoresRequest ScoresRequest
     */
    public $scoresRequest;
    /**
     * @var $usersRequest UsersRequest
     */
    public $usersRequest;
    /**
     * @var $notificationRequest NotificationsRequest
     */
    public $notificationRequest;
    /**
     * @var $discoverRequest DiscoverRequest
     */
    public $discoverRequest;

    /**
     * @var $creativesRequest CreativesRequest
     */
    public $creativesRequest;

    /**
     * @var $directV2Request Direct_v2Request
     */
    public $directV2Request;

    /**
     * @var $statusRequest StatusRequest
     */
    public $statusRequest;

    //////

    /**
     * @var $cookiesStorage CookiesStorageInterface
     */
    protected $cookiesStorage;

    /**
     * @var $cookiesStorage CookiesStorageInterface
     */
    protected $authorizationStorage;

    /**
     * @var $username string
     */
    protected $username = null;


    /**
     * Instagram constructor.
     */
    public function __construct() {
        $this->cookiesStorage = new CookiesStorageRepository();
        $this->authorizationStorage = new AuthorizationStorageRepository();

        parent::__construct();

        $this->accountRequest = new AccountRequest($this);
        $this->people = new PeopleRequest($this);
        $this->launcherRequest = new LauncherRequest($this);
        $this->qERequest = new QERequest($this);
        $this->multipleAccounts = new MultipleAccountsRequest($this);
        $this->banyanRequest = new BanyanRequest($this);
        $this->feedRequest = new FeedRequest($this);
        $this->newsRequest = new NewsRequest($this);
        $this->mediaRequest = new MediaRequest($this);
        $this->businessRequest = new BusinessRequest($this);
        $this->scoresRequest = new ScoresRequest($this);
        $this->usersRequest = new UsersRequest($this);
        $this->qPRequest = new QPRequest($this);
        $this->notificationRequest = new NotificationsRequest($this);
        $this->discoverRequest = new DiscoverRequest($this);
        $this->creativesRequest = new CreativesRequest($this);
        $this->directV2Request = new Direct_v2Request($this);
        $this->statusRequest = new StatusRequest($this);
    }

    /**
     * @param $username string
     * @param $password string
     * @param $relogin bool
     *
     * @return bool|Response|Response\LoginResponse
     *
     * @throws \Exception
     */
    public function login($username, $password, $relogin = false) {
        if ($this->device_storage->session_exists($username) === true && $this->device_storage->session_is_valid($username) === true && $relogin === false) {

            $session = $this->device_storage->read_device_settings($username);
            $this->initDeviceFromArray($session);
            $this->readCookies($username, $this->cookiesStorage);
            $this->readAuthorization($username, $this->authorizationStorage);
        } else {
            $this->getDeviceStorage()->save_device_settings($username,
                $this->getDeviceId(), $this->getPhoneId(),
                $this->getAdvertisingId(), $this->getUuid(),
                $this->getAndroidId()
            );
        }

        return $this->checkAndRelogin($username, $password, $relogin);

    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Pre Login flow
     */
    public function _preLoginFlowRequests() {
        $this->accountRequest->contactPointPrefill();
        $this->launcherRequest->preLoginSync();
        $this->qERequest->syncLoginExperiments();
        $this->launcherRequest->preLoginSync();
        $this->qERequest->syncLoginExperiments();
    }

    //ooh...
    public function _postLoginFlow() {
        $this->launcherRequest->postLoginSync();
        $this->multipleAccounts->get_account_family();
        $this->qERequest->syncPostLoginExperiments();
        $this->banyanRequest->banyan();
        $this->feedRequest->reels_tray();
        $this->feedRequest->feed_timeline();
//        POST /api/v1/push/register/
//        POST /api/v1/push/register/
        $this->newsRequest->inbox();
        $this->mediaRequest->blocked();
        $this->multipleAccounts->get_linkage_status();
        $this->accountRequest->fetch_config();
        $this->businessRequest->get_monetization_products_eligibility_data();
        $this->businessRequest->should_require_professional_account();
        $this->scoresRequest->bootstrap_users();
        $this->usersRequest->arlink_download_info();
        $this->qPRequest->get_cooldowns();
        $this->notificationRequest->badge();
        $this->discoverRequest->topical_explore();
        $this->qPRequest->batch_fetch();
        $this->usersRequest->user_info($this->get_cookie_from_name('ds_user_id'));
        $this->creativesRequest->write_supported_capabilities();
        $this->directV2Request->get_presence();
        $this->statusRequest->get_viewable_statuses();
        $this->directV2Request->get_Inbox();
        $this->directV2Request->get_Inbox(null);
        $this->accountRequest->process_contact_point_signals();
    }

    /**
     * @param $username string
     * @param $password string
     * @param $relogin bool
     *
     * @return bool|Response|Response\LoginResponse
     *
     * @throws \Exception
     */
    protected function checkAndRelogin($username, $password, $relogin) {
        if ($this->authorizationStorage->is_valid_authorization($username) === false || $relogin === true) {
            $this->_preLoginFlowRequests();
            $login = $this->_login($username, $password);
            $this->_postLoginFlow();
            return $login;
        } else {
            $this->setUsernameAndCookieStorage($username, $this->cookiesStorage);
            return true;
        }
    }

    /**
     * Gets the [0] value of an array
     *
     * @param $array array
     *
     * @return string
     */
    protected function zeroArrayValue($array) {
        if ($array !== null && is_array($array)) {
            return $array[0];
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function getPasswordEncPubKey() {
        return $this->passwordEncPubKey;
    }

    /**
     * @return int
     */
    public function getPasswordPubKeyId() {
        return $this->passwordPubKeyId;
    }


    /**
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     *
     * @throws \Exception
     */
    protected function _login($username, $password) {
        $this->username = $username;

        $lastResponse = $this->getLastResponse();
        if ($lastResponse !== null) {
            $this->setPasswordEncPubKey($this->zeroArrayValue($lastResponse->getHeader("ig-set-password-encryption-pub-key")));
            $this->setPasswordPubKeyId($this->zeroArrayValue($lastResponse->getHeader("ig-set-password-encryption-key-id")));
            $response = $this->accountRequest->login($username, $password);
        } else {
            $response = $this->accountRequest->login_deprecated($username, $password);
        }
        $this->saveCookies($username, $this->cookiesStorage);

        if ($response->getInvalidCredentials() === true ) {
            throw new \Exception(($response->isErrorTitle() === true) ? $response->getErrorTitle() : $response->getErrorType(), 1);
        } else {
            if ($response->getStatus() === 'fail' && $response->getTwoFactorRequired() === true){
                $ver_code = readline("Two Factor Authentication Required, please enter your verification code: ");
                $res = $this->accountRequest->two_factor_login($ver_code, $response->getTwoFactorInfo()->getTwoFactorIdentifier(), $username);

                if ($res->getStatus() == 'ok'){
                    $this->saveAuthorization($username, $this->authorizationStorage);
                    return $response;
                }else{
                    throw new \Exception(($response->isErrorTitle() === true) ? $response->getErrorTitle() : $response->getErrorType(), 1);
                }
            }else{
                if ($response->getStatus() == 'ok'){
                    $this->saveAuthorization($username, $this->authorizationStorage);
                    return $response;
                }else{
                    throw new \Exception(($response->isErrorTitle() === true) ? $response->getErrorTitle() : $response->getErrorType(), 1);
                }
            }

        }
    }

}
