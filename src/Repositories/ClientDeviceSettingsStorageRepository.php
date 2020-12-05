<?php

namespace InstagramFollowers\Repositories;

use InstagramFollowers\Interfaces\ClientDeviceSettingsStorageInterface;


/**
 * Class ClientDeviceSettingsStorageRepository
 * //TODO make expections for these funtions
 * @package InstagramFollowers\Repositories
 */
class ClientDeviceSettingsStorageRepository extends Repository implements ClientDeviceSettingsStorageInterface {

    /**
     * @param string $username string
     * @param string $device_id string
     * @param string $phone_id string
     * @param string $advertising_id string
     * @param string $uuid string
     * @param string $android_id string
     *
     * @return bool
     */
    public function save_device_settings($username, $device_id, $phone_id, $advertising_id, $uuid, $android_id) {
        if ($this->openFolder($username) === true) {
            $fileName = $this->getFileName($username, 'device_settings.json');
            $dataArray = [
                'device_id' => $device_id,
                'phone_id' => $phone_id,
                'advertising_id' => $advertising_id,
                'uuid' => $uuid,
                'android_id' => $android_id,
            ];
            $jsonString = json_encode($dataArray);
            $result = file_put_contents($fileName, $jsonString);
            return ($result === false) ? false : true;
        }
        return false;
    }

    /**
     * @param string $username
     *
     * @return array
     */
    public function read_device_settings($username) {
        if ($this->openFolder($username) === true) {
            $fileName = $this->getFileName($username, 'device_settings.json');
            $fileData = file_get_contents($fileName);

            $jsonObject = json_decode($fileData, true);

            if (is_array($jsonObject) === true) {
                return $jsonObject;
            } else {
                return [];
            }
        }
        return [];
    }

    /**
     * @param string $username
     * @return bool
     */
    public function session_exists($username) {
        return $this->file_exist($username, 'device_settings.json');
    }

    /**
     * @param string $username
     * @return bool
     */
    public function session_is_valid($username) {
        if ($this->session_exists($username) === true) {
            $sessionData = $this->read_device_settings($username);
            $result = array_key_exists("device_id", $sessionData) === true &&
                array_key_exists("phone_id", $sessionData) === true &&
                array_key_exists("advertising_id", $sessionData) === true &&
                array_key_exists("uuid", $sessionData) === true &&
                array_key_exists("android_id", $sessionData) === true;
            return $result;
        } else {
            return false;
        }
    }

    /**
     * @param $username string
     * @param $settingsName string
     * @param $defaultValue string
     *
     * @return string
     *
     * @throws \Exception
     */
    public function readSettings($username, $settingsName, $defaultValue) {
        $fileExist = $this->file_exist($username, 'settings.json');
        if ($fileExist === true && $this->openFolder($username) === true) {
            $fileName = $this->getFileName($username, 'settings.json');
            $fileData = file_get_contents($fileName);

            $jsonObject = json_decode($fileData, true);

            if (is_array($jsonObject) === true && array_key_exists($settingsName, $jsonObject)) {
                return $jsonObject[$settingsName];
            }
        }
        return $defaultValue;
    }

    /**
     * @param string $username string
     * @param string $settingsName string
     * @param string $settingsValue string
     *
     * @return bool
     */
    public function writeSetting($username, $settingsName, $settingsValue) {
        if ($this->openFolder($username) === true) {
            $fileName = $this->getFileName($username, 'settings.json');
            $jsonArray = [];
            if ($this->file_exist($username, 'settings.json') === true) {
                $fileData = file_get_contents($fileName);
                $jsonArray = json_decode($fileData, true);
            }
            $jsonArray[$settingsName] = $settingsValue;

            $jsonString = json_encode($jsonArray);
            $result = file_put_contents($fileName, $jsonString);
            return ($result === false) ? false : true;
        }
        return false;
    }


}
