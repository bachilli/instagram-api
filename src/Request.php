<?php

namespace InstagramFollowers;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use GuzzleHttp\Exception\GuzzleException;
use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Devices\DeviceModel;
use InstagramFollowers\Devices\UserAgent;
use InstagramFollowers\Interfaces\AuthorizationStorageInterface;
use InstagramFollowers\Interfaces\ClientDeviceSettingsStorageInterface;
use InstagramFollowers\Interfaces\CookiesStorageInterface;
use InstagramFollowers\Request\Models\RequestBodyModel;
use InstagramFollowers\Request\Models\XHeadersModel;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Request
 * @package InstagramFollowers
 */
class Request {

    /**
     * @var $X_Headers XHeadersModel
     */
    protected $X_Headers;
    /**
     * @var $_userAgent string
     */
    protected $_userAgent;
    /**
     * @var $_authorization string
     */
    protected $_authorization;

    /**
     * @var $body RequestBodyModel[]
     */
    protected $body = [];

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleHttpClient;

    /**
     * @var $endpointURI string
     */
    protected $endpointURI;
    /**
     * @var $returnObject Response
     */
    protected $returnObject;

    /**
     * @var $proxy string|null
     */
    protected $proxy = null;

    /**
     * @var $needAuthorization bool
     */
    protected $needAuthorization = true;

    /**
     * @var $cookieJar CookieJar
     */
    protected $cookieJar;

    /**
     * @var $response ResponseInterface
     */
    protected $response;

    /**
     * @var $settingsID string|null
     */
    protected $settingsID = null;

    /**
     * @var $cookieStorage null|CookiesStorageInterface
     */
    protected $cookieStorage = null;

    /**
     * @var $cookieStorage ClientDeviceSettingsStorageInterface
     */
    protected $clientDeviceSettingsStorage;

    /**
     * @var $is_compressed bool
     */
    protected $is_compressed = false;

    /**
     * @var $is_octet_stream bool
     */
    protected $is_octet_stream = false;

    /**
     * @var $device DeviceModel
     */
    protected $device ;

    /**
     * Request constructor.
     * @param $X_Headers XHeadersModel
     * @param $clientDeviceSettingsStorage ClientDeviceSettingsStorageInterface
     */
    public function __construct($X_Headers, $clientDeviceSettingsStorage) {
        $this->X_Headers = $X_Headers;
        $userAgentGenerator = new UserAgent();
        $this->_userAgent = $userAgentGenerator->generate_UserAgent();
        $this->device = $userAgentGenerator->getDeviceModel();

        $this->cookieJar = new CookieJar();
        $this->_authorization = '';
        $this->clientDeviceSettingsStorage = $clientDeviceSettingsStorage;

        $this->guzzleHttpClient = new \GuzzleHttp\Client(
            [
                'exceptions' => false,
                'verify' => false,
                'cookies' => true
            ]
        );
    }

    /**
     * @return string
     */
    public function get_csrt_token() {
        $tokenCookie = $this->cookieJar->getCookieByName('csrftoken');
        return ($tokenCookie === null) ? "" : $tokenCookie->getValue();
    }

    /**
     * @return DeviceModel
     */
    public function getDevice() {
        return $this->device;
    }

    /**
     * @param $cookieName
     * @return string
     */
    public function get_cookie_from_name($cookieName) {
        $cookie = $this->cookieJar->getCookieByName($cookieName);
        return ($cookie === null) ? "" : $cookie->getValue();
    }

    /**
     * @return ResponseInterface
     */
    public function getLastResponse() {
        return $this->response;
    }

    /**
     * @param $bool boolean
     *
     * @return $this
     */
    public function isCompressed($bool) {
        if (is_bool($bool)) {
            $this->is_compressed = $bool;
        }
        return $this;
    }

    /**
     * @param $username string
     * @param $cookiesStorage CookiesStorageInterface
     *
     * @return bool
     */
    public function saveCookies($username, $cookiesStorage) {
        $this->settingsID = $username;
        $this->cookieStorage = $cookiesStorage;
        $cookiesArray = $this->cookieJar->toArray();
        if ($cookiesArray !== []) {
            return $cookiesStorage->saveCookies($username, $cookiesArray);
        }
        return true;
    }

    /**
     * @param $username string
     * @param $cookiesStorage CookiesStorageInterface
     */
    public function setUsernameAndCookieStorage($username, $cookiesStorage) {
        $this->settingsID = $username;
        $this->cookieStorage = $cookiesStorage;
    }

    /**
     * @param $username string
     * @param $cookiesStorage CookiesStorageInterface
     *
     * @return bool
     */
    public function readCookies($username, $cookiesStorage) {
        if ($cookiesStorage->cookiesExist($username) === true) {
            $cookiesArray = $cookiesStorage->readCookies($username);
            $cookieJar = $this->cookCookies($cookiesArray);
            $this->cookieJar = $cookieJar;
            $this->cookieJar = $cookieJar;
            $this->settingsID = $username;
            return true;
        } else {
            return false;
        }
    }


    /**
     * Create a new Cookie jar from an associative array.
     *
     * @param array $cookies Cookies to create the jar from
     *
     * @return CookieJar
     */
    public function cookCookies(array $cookies) {
        $cookieJar = new CookieJar();
        foreach ($cookies as $cookie) {
            $cookieJar->setCookie(new SetCookie([
                'Domain' => $cookie['Domain'],
                'Name' => $cookie['Name'],
                'Value' => $cookie['Value'],
                'Discard' => $cookie['Discard']
            ]));
        }

        return $cookieJar;
    }


    /**
     * @param $username string
     * @param $authorizationStorage AuthorizationStorageInterface
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function readAuthorization($username, $authorizationStorage) {
        $this->_authorization = $authorizationStorage->readAuthorization($username);

        $xigSetHeader = $this->clientDeviceSettingsStorage->readSettings($username, 'xigsetwwwclaim_header', 0);
        $this->_userAgent = $this->clientDeviceSettingsStorage->readSettings($username, 'user_agent', $this->_userAgent);

        $this->X_Headers->setXIGWWWClaim($xigSetHeader);

        return strcmp($this->_authorization, '') > 0;
    }

    /**
     * @param $requestBodyModel RequestBodyModel
     * @return $this
     */
    public function addParamA($requestBodyModel) {
        if ($requestBodyModel instanceof RequestBodyModel) {
            $this->body[] = $requestBodyModel;
        }
        return $this;
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function addParam($name, $value) {
        $this->body[] = new RequestBodyModel($name, $value);

        return $this;
    }

    /**
     * @return XHeadersModel
     */
    public function getXHeaders() {
        return $this->X_Headers;
    }

    /**
     * @return string
     */
    public function getUserAgent() {
        return $this->_userAgent;
    }

    /**
     * @return string
     */
    public function getAuthorization() {
        return $this->_authorization;
    }

    /**
     * @return RequestBodyModel[]
     */
    public function getBody() {
        return $this->body;

    }

    /**
     * @param bool $auth
     * @return $this
     */
    public function needAuthorization($auth = true) {
        $this->needAuthorization = $auth;
        return $this;
    }

    /**
     * @param bool $get
     * @return array
     */
    protected function buildOptions($get = false) {
        $options = [];

        if ($this->proxy !== null) {
            $options['proxy'] = $this->proxy;
        }

        $options['headers'] = $this->prepareHeaders();
        $options['cookies'] = $this->cookieJar;

        if ($get === true) {
            return ['body' => $this->prepareBody(), 'options' => $options];
        } else {
            $options['body'] = $this->prepareBody();
        }


        return $options;
    }

    /**
     * @param $uri
     * @param $returnObject
     * @param $addBaseURL
     *
     * @return $this
     */
    public function request($uri, $returnObject, $addBaseURL = false) {
        if ($addBaseURL === true) {
            $this->endpointURI = InstagramConstants::INSTAGRAM_API_BASE_URL . $uri;
        } else {
            $this->endpointURI = InstagramConstants::INSTAGRAM_API_URL . $uri;
        }
        $this->returnObject = $returnObject;
        return $this;
    }

    /**
     * @return bool|Response
     */
    public function post() {
        return $this->_req($this->endpointURI, $this->returnObject, 'POST');
    }

    /**
     * @return bool|Response
     */
    public function get() {
        return $this->_req($this->endpointURI, $this->returnObject, 'GET');
    }

    protected function readHeader($header_name) {
        if ($this->response->hasHeader($header_name) === true){
            return $this->response->getHeaderLine($header_name);
        }else{
            return false;
        }
    }

    /**
     * Checks and extracts response headers
     */
    protected function extractNeededHeaders() {
        $xigsetwwwclaim_header = $this->readHeader('x-ig-set-www-claim');
        $igsetauthorization_header = $this->readHeader('ig-set-authorization');


        if ($xigsetwwwclaim_header !== false) {
            $this->X_Headers->setXIGWWWClaim($xigsetwwwclaim_header);
        }

        if ($igsetauthorization_header !== false && strcmp($igsetauthorization_header, 'Bearer IGT:2:') !== 0) {
            $this->_authorization = $igsetauthorization_header;
        }

        if ($this->settingsID !== null) {
            $this->clientDeviceSettingsStorage->writeSetting($this->settingsID, 'xigsetwwwclaim_header', $xigsetwwwclaim_header);
        }

    }

    /**
     * @param $username string
     * @param $authorizationStorage AuthorizationStorageInterface
     *
     * @return bool
     */
    public function saveAuthorization($username, $authorizationStorage) {
        $this->clientDeviceSettingsStorage->writeSetting($username, 'user_agent', $this->_userAgent);
        return $authorizationStorage->saveAuthorization($username, $this->_authorization);
    }

    public function addMultibyteBody($bytes) {
        $this->body = $bytes;
        $this->is_octet_stream = true;
        return $this;
    }

    /**
     * @param $endpoint string
     * @param $returnObject Response
     * @param $method string
     *
     * @return Response|bool
     */
    protected function _req($endpoint, $returnObject, $method) {
        $this->checkXHeaderXMIDCookie();
        $buildOptions = $this->buildOptions($method == "GET");
        try {
            $endpointS = $endpoint;
            $optionsM = $buildOptions;

            if ($method == "GET") {
                $endpointS .= '?' . $buildOptions['body'];
                $optionsM = $buildOptions['options'];
            } else {
                if ($this->is_octet_stream === true) {
                    $optionsM['headers']['Content-Type'] = 'application/octet-stream';
                } else {
                    $optionsM['headers']['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
                }
            }
            $this->response = $this->guzzleHttpClient->request($method, $endpointS, $optionsM);
            //$this->cookieJar = $this->guzzleHttpClient->getConfig('cookies');
            $this->body = [];
            if ($this->cookieStorage !== null && $this->settingsID !== null) {
                $this->saveCookies($this->settingsID, $this->cookieStorage);
            }
            $this->extractNeededHeaders();
            $this->isCompressed(false);
            $this->is_octet_stream = false;
            return $this->toObject($returnObject);
        } catch (GuzzleException $e) {
            $this->isCompressed(false);
            return false;
        }
    }

    /**
     * Sets the value of X-MID header
     */
    protected function checkXHeaderXMIDCookie() {
        $xmid = $this->cookieJar->getCookieByName('mid');

        if ($xmid !== null) {
            $this->X_Headers->setXMID($xmid->getValue());

        }
    }

    /**
     * @param $returnObject Response
     *
     * @return Response
     */
    protected function toObject($returnObject) {
        $dataObject = json_decode($this->response->getBody()->getContents(), true);
        if ($dataObject !== null) {
            return new $returnObject($dataObject);
        } else {
            return new $returnObject([]);
        }
    }

    /**
     * @return string
     */
    protected function prepareBody() {
        if ($this->is_octet_stream === false) {

            $bodyTmp = '';
            foreach ($this->getBody() as $requestBodyModel) {
                $bodyTmp .= $requestBodyModel->getName() . '=' . $requestBodyModel->getValue() . '&';
            }
            $body = rtrim($bodyTmp, "&");

        } else {
            $body = $this->getBody();
        }

        return ($this->is_compressed === true) ? gzcompress($body, 9) : $body;
    }

    /**
     * //TODO: investigate the max and min numbers of these fields
     */
    protected function speedTest() {
        $totalBytes = rand(7000, 73519);
        $totalTimeMS = rand(100, 131);
        $speedKBPS = number_format($totalBytes / $totalTimeMS, 3, '.', '');

        if ($this->getXHeaders()->getXIGBandwidthSpeedKBPS() === '-1.000') {
            $this->getXHeaders()->setXIGBandwidthSpeedKBPS($speedKBPS);
            $this->getXHeaders()->setXIGBandwidthTotalBytesB($totalBytes);
            $this->getXHeaders()->setXIGBandwidthTotalTimeMS($totalTimeMS);
        }

    }

    /**
     * @return array
     */
    protected function prepareHeaders() {
        $xHeaders = $this->getXHeaders()->toArray();
        $xHeaders['User-Agent'] = $this->getUserAgent();
        $xHeaders['Accept-Language'] = 'en-US';

        if ($this->needAuthorization === true) {
            $this->speedTest();
            $xHeaders['Authorization'] = $this->getAuthorization();
        }
        $xHeaders['Accept-Encoding'] = 'gzip, deflate';
        return $xHeaders;
    }

}
