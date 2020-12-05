<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Interfaces\ModelInterface;
use InstagramFollowers\Interfaces\RequestBuildXHeaderInterface;
use InstagramFollowers\Request\Models\XHeadersModel;
use InstagramFollowers\Traits\XPigeonTrait;

/**
 * Class BuildXHeaders
 * @package InstagramFollowers\Request
 */
class BuildXHeaders implements RequestBuildXHeaderInterface {
    use XPigeonTrait;
    /**
     * @var $model XHeadersModel
     */
    protected $model;


    /**
     * BuildXHeaders constructor.
     * @param string $device_id
     * @param string $android_id
     * @param string $app_Locale
     * @param string $device_Locale
     * @param string $mapped_Locale
     * @param string $startup_country
     */
    public function __construct($device_id, $android_id, $XMID, $app_Locale = "en_US", $device_Locale = "en_US", $mapped_Locale = "en_US", $startup_country = 'EN') {
        $this->model = new XHeadersModel();

        $this->model->setXIGAppLocale($app_Locale);
        $this->model->setXIGDeviceLocale($device_Locale);
        $this->model->setXIGMappedLocale($mapped_Locale);
        $this->model->setXPigeonSessionId($this->generate_Session_Id());
        $this->model->setXPigeonRawclienttime($this->generate_Rawclienttime());
        $this->model->setXIGConnectionSpeed('-1kbps');
        $this->model->setXIGBandwidthSpeedKBPS('-1.000');
        $this->model->setXIGBandwidthTotalBytesB("0");
        $this->model->setXIGBandwidthTotalTimeMS("0");
        $this->model->setXIGAppStartupCountry($startup_country);
        $this->model->setXBloksVersionId("eacf6da5385f864af32eacb0b8c86530ef66ef1856961080bb20605e9d807f46");
        $this->model->setXIGWWWClaim("0");
        $this->model->setXBloksIsLayoutRTL("false");
        $this->model->setXIGDeviceID($device_id);
        $this->model->setXIGAndroidID($android_id);
        $this->model->setXIGConnectionType('WIFI');
        $this->model->setXIGCapabilities('3brTvwM=');
        $this->model->setXIGAppID('567067343352427');
        $this->model->setXMID($XMID);
        $this->model->setXFBHTTPEngine("Liger");

    }

    /**
     * @return string
     */
    public function toJson() {
        return $this->model->toJson();
    }

    /**
     * @return array
     */
    public function toArray() {
        return $this->model->toArray();
    }

    /**
     * @return XHeadersModel|ModelInterface
     */
    public function getHeaders() {
        return $this->model;
    }
}
