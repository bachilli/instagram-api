<?php

namespace InstagramFollowers\Devices;

class DeviceModel {

    public $osVersion;
    public $densityDPI;
    public $pixels;
    public $manufacturer;
    public $model;
    public $device;
    public $hardware;

    /**
     * @return string
     */
    public function getOsVersion() {
        return $this->osVersion;
    }

    /**
     * @param string $osVersion
     */
    public function setOsVersion($osVersion) {
        $this->osVersion = $osVersion;
    }

    /**
     * @return string
     */
    public function getDensityDPI() {
        return $this->densityDPI;
    }

    /**
     * @param string $densityDPI
     */
    public function setDensityDPI($densityDPI) {
        $this->densityDPI = $densityDPI;
    }

    /**
     * @return string
     */
    public function getPixels() {
        return $this->pixels;
    }

    /**
     * @param string $pixels
     */
    public function setPixels($pixels) {
        $this->pixels = $pixels;
    }

    /**
     * @return string
     */
    public function getManufacturer() {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model) {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getDevice() {
        return $this->device;
    }

    /**
     * @param string $device
     */
    public function setDevice($device) {
        $this->device = $device;
    }

    /**
     * @return string
     */
    public function getHardware() {
        return $this->hardware;
    }

    /**
     * @param string $hardware
     */
    public function setHardware($hardware) {
        $this->hardware = $hardware;
    }


}
