<?php

namespace InstagramFollowers;

use InstagramFollowers\Interfaces\ClientDeviceSettingsStorageInterface;
use InstagramFollowers\Internal\NanoTime;
use InstagramFollowers\Repositories\ClientDeviceSettingsStorageRepository;
use InstagramFollowers\Request\BuildXHeaders;
use InstagramFollowers\Traits\GenerateUUIDV4Trait;

/**
 * Class Client
 * @package InstagramFollowers
 */
class Client extends Request {
    use GenerateUUIDV4Trait;
    /**
     * @var $device_id string
     */
    protected $device_id;

    /**
     * @var $android_id string
     */
    protected $android_id;

    /**
     * @var $phone_id string
     */
    protected $phone_id;

    /**
     * @var $advertising_id string
     */
    protected $advertising_id;

    /**
     * @var $uuid string
     */
    protected $uuid;

    /**
     * @var $device_storage ClientDeviceSettingsStorageInterface
     */
    protected $device_storage;


    /**
     * @var $passwordEncPubKey string
     */
    protected $passwordEncPubKey;

    /**
     * @var $passwordPubKeyId int
     */
    protected $passwordPubKeyId;

    /**
     * @var $nanoTime NanoTime
     */
    protected $nanoTime;


    /**
     * Client constructor.
     */
    public function __construct() {
        $this->device_storage = new ClientDeviceSettingsStorageRepository();
        $this->nanoTime = new NanoTime();
        $this->initDevice();
        $xHeaders = new BuildXHeaders($this->device_id, $this->android_id, '');
        parent::__construct($xHeaders->getHeaders(), $this->device_storage);
    }

    protected function initDevice() {
        $this->device_id = $this->generateUUID(true);
        $this->phone_id = $this->generateUUID(true);
        $this->advertising_id = $this->generateUUID(true);
        $this->uuid = $this->generateUUID(true);
        $megaRandomHash = md5(number_format(microtime(true), 7, '', ''));
        $this->android_id = 'android-' . substr($megaRandomHash, 16);
    }

    /**
     * @return NanoTime
     */
    public function getNanoTime() {
        return $this->nanoTime;
    }



    public function initDeviceFromArray($array) {
        $this->device_id = $array['device_id'];
        $this->phone_id = $array['phone_id'];
        $this->advertising_id = $array['advertising_id'];
        $this->uuid = $array['uuid'];
        $this->android_id = $array['android_id'];
        $xHeaders = new BuildXHeaders($this->device_id, $this->android_id, '');
        parent::__construct($xHeaders->getHeaders(), $this->device_storage);
    }

    /**
     * @return string
     */
    public function getPasswordEncPubKey() {
        return $this->passwordEncPubKey;
    }

    /**
     * @param string $passwordEncPubKey
     */
    public function setPasswordEncPubKey($passwordEncPubKey) {
        $this->passwordEncPubKey = $passwordEncPubKey;
    }

    /**
     * @return int
     */
    public function getPasswordPubKeyId() {
        return $this->passwordPubKeyId;
    }

    /**
     * @param int $passwordPubKeyId
     */
    public function setPasswordPubKeyId($passwordPubKeyId) {
        $this->passwordPubKeyId = $passwordPubKeyId;
    }


    /**
     * @return ClientDeviceSettingsStorageInterface
     */
    public function getDeviceStorage() {
        return $this->device_storage;
    }

    /**
     * @return string
     */
    public function getAdvertisingId() {
        return $this->advertising_id;
    }

    /**
     * @return string
     */
    public function getUuid() {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getDeviceId() {
        return $this->device_id;
    }

    /**
     * @return string
     */
    public function getAndroidId() {
        return $this->android_id;
    }

    /**
     * @return string
     */
    public function getPhoneId() {
        return $this->phone_id;
    }


}
