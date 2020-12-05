<?php

namespace InstagramFollowers\Devices;

class GoodDevices {

    const DEVICES = [
        /*
         * Xiaomi Mi A2. Released: 2018, July.
         */
        '28/9; 480dpi; 1080x2016; Xiaomi/xiaomi; Mi A2; jasmine_sprout; qcom',

        /*
         * LG Stylo 5. Released: 2019, June.
         */
        '28/9; 480dpi; 1080x2016; LGE/lge; LGL722DL; cv7as; cv7as',

        /*
         * Xiaomi Redmi Note 8T. Released: 2019, November.
         */
        '28/9; 440dpi; 1080x2130; Xiaomi/xiaomi; Redmi Note 8T; willow; qcom',

        /*
         * Huawei Mate 20 Lite. Released: 2018, September.
         */
        '29/10; 480dpi; 1080x2128; HUAWEI; SNE-LX1; HWSNE; kirin710',

        /*
        * Samsung Galaxy A10E S102DL. Released: 2019, August.
        */
        '28/9; 320dpi; 720x1402; samsung; SM-S102DL; a10e; exynos7885',

        /*
         * Samsung Galaxy S10 Plus SM-G975U. Released: 2019, March.
         */
        '29/10; 420dpi; 1080x2047; samsung; SM-G975U; beyond2q; qcom',
    ];

    /**
     * Retrieve the device string for a random good device.
     *
     * @return DeviceModel
     */
    public static function getRandomGoodDevice() {
        $randomIdx = array_rand(self::DEVICES, 1);

        $device = explode(';', self::DEVICES[$randomIdx]);
        $deviceModel = new DeviceModel();


        $deviceModel->setOsVersion($device[0]);
        $deviceModel->setDensityDPI($device[1]);
        $deviceModel->setPixels($device[2]);
        $deviceModel->setManufacturer($device[3]);
        $deviceModel->setModel($device[4]);
        $deviceModel->setDevice($device[5]);
        $deviceModel->setHardware($device[6]);
        return $deviceModel;


    }

}
