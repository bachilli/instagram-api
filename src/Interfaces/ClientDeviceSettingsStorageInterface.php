<?php

namespace InstagramFollowers\Interfaces;

/**
 * Interface ClientDeviceSettingsStorageInterface
 * @package InstagramFollowers\Interfaces
 */
interface ClientDeviceSettingsStorageInterface {

    /**
     * @param $username string
     * @param $device_id string
     * @param $phone_id string
     * @param $advertising_id string
     * @param $uuid string
     * @param $android_id string
     *
     * @return bool
     */
    public function save_device_settings($username, $device_id, $phone_id, $advertising_id, $uuid, $android_id);

    /**
     * This function returns the device settings in an array
     *  Array Example:
     * {
     *      device_id: string,
     *      phone_id: string,
     *      advertising_id: string,
     *      uuid: string,
     *      android_id: string
     * }
     * @param $username string
     *
     * @return array
     */
    public function read_device_settings($username);

    /**
     * @param $username string
     *
     * @return bool
     */
    public function session_exists($username);

    /**
     * @param $username string
     *
     * @return bool
     */
    public function session_is_valid($username);

    /**
     * @param $username string
     * @param $settingsName string
     * @param $defaultValue string
     *
     * @return string
     */
    public function readSettings($username, $settingsName, $defaultValue);

    /**
     * @param $username string
     * @param $settingsName string
     * @param $settingsValue string
     *
     * @return bool
     */
    public function writeSetting($username, $settingsName, $settingsValue);
}
