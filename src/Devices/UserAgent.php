<?php

namespace InstagramFollowers\Devices;

use InstagramFollowers\Constants\InstagramConstants;

class UserAgent {

    protected $formatString = 'Instagram %s Android (%s;%s;%s;%s;%s;%s;%s; %s; %s)';
    /**
     * @var $deviceModel DeviceModel
     */
    protected $deviceModel;

    public function generate_UserAgent($locale = "en_US") {
        $app_version_name = InstagramConstants::APP_VERSION_NAME;
        $app_version_code = InstagramConstants::APP_VERSION_CODE;
        $deviceModel = GoodDevices::getRandomGoodDevice();
        $this->deviceModel = $deviceModel;

        return sprintf(
            $this->formatString,
            $app_version_name,
            $deviceModel->getOsVersion(),
            $deviceModel->getDensityDPI(),
            $deviceModel->getPixels(),
            $deviceModel->getManufacturer(),
            $deviceModel->getModel(),
            $deviceModel->getDevice(),
            $deviceModel->getHardware(),
            $locale,
            $app_version_code
        );
    }

    /**
     * @return DeviceModel
     */
    public function getDeviceModel() {
        return $this->deviceModel;
    }


}
