<?php

namespace InstagramFollowers\Request\Models;

use InstagramFollowers\Interfaces\ModelInterface;

class XHeadersModel implements ModelInterface {

    public $X_IG_App_Locale = '';
    public $X_IG_Device_Locale = '';
    public $X_IG_Mapped_Locale = '';
    public $X_Pigeon_Session_Id = '';
    public $X_Pigeon_Rawclienttime = '';
    public $X_IG_Connection_Speed = '';
    public $X_IG_Bandwidth_Speed_KBPS = '';
    public $X_IG_Bandwidth_TotalBytes_B = '';
    public $X_IG_Bandwidth_TotalTime_MS = '';
    public $X_IG_App_Startup_Country = '';
    public $X_Bloks_Version_Id = '';
    public $X_IG_WWW_Claim = 0;
    public $X_Bloks_Is_Layout_RTL = false;
    public $X_IG_Device_ID = '';
    public $X_IG_Android_ID = '';
    public $X_IG_Connection_Type = '';
    public $X_IG_Capabilities = '';
    public $X_IG_App_ID = '';
    public $X_MID = '';
    public $X_FB_HTTP_Engine = '';

    public function toJson() {
        return json_encode($this->toArray());
    }

    public function addHeader($name, $value) {
        $this->$name = $value;
    }

    public function deleteHeader($name){
        unset($this->$name);

    }

    public function toArray() {
        $tmpArray = [];
        foreach (get_object_vars($this) as $variableName => $variableValue) {
            if ($variableName == 'X_FB_PHOTO_WATERFALL_ID') {
                $tmpArray[$variableName] = $variableValue;

            } else {
                $tmpArray[str_replace("_", '-', $variableName)] = $variableValue;
            }
        }
        return $tmpArray;
    }

    /**
     * @return string
     */
    public function getXIGAppLocale() {
        return $this->X_IG_App_Locale;
    }

    /**
     * @return string
     */
    public function getXIGDeviceLocale() {
        return $this->X_IG_Device_Locale;
    }

    /**
     * @return string
     */
    public function getXIGMappedLocale() {
        return $this->X_IG_Mapped_Locale;
    }

    /**
     * @return string
     */
    public function getXPigeonSessionId() {
        return $this->X_Pigeon_Session_Id;
    }

    /**
     * @return string
     */
    public function getXPigeonRawclienttime() {
        return $this->X_Pigeon_Rawclienttime;
    }

    /**
     * @return string
     */
    public function getXIGConnectionSpeed() {
        return $this->X_IG_Connection_Speed;
    }

    /**
     * @return string
     */
    public function getXIGBandwidthSpeedKBPS() {
        return $this->X_IG_Bandwidth_Speed_KBPS;
    }

    /**
     * @return string
     */
    public function getXIGBandwidthTotalBytesB() {
        return $this->X_IG_Bandwidth_TotalBytes_B;
    }

    /**
     * @return string
     */
    public function getXIGBandwidthTotalTimeMS() {
        return $this->X_IG_Bandwidth_TotalTime_MS;
    }

    /**
     * @return string
     */
    public function getXIGAppStartupCountry() {
        return $this->X_IG_App_Startup_Country;
    }

    /**
     * @return string
     */
    public function getXBloksVersionId() {
        return $this->X_Bloks_Version_Id;
    }

    /**
     * @return string
     */
    public function getXIGWWWClaim() {
        return $this->X_IG_WWW_Claim;
    }

    /**
     * @return bool
     */
    public function isXBloksIsLayoutRTL() {
        return $this->X_Bloks_Is_Layout_RTL;
    }

    /**
     * @return string
     */
    public function getXIGDeviceID() {
        return $this->X_IG_Device_ID;
    }

    /**
     * @return string
     */
    public function getXIGAndroidID() {
        return $this->X_IG_Android_ID;
    }

    /**
     * @return string
     */
    public function getXIGConnectionType() {
        return $this->X_IG_Connection_Type;
    }

    /**
     * @return string
     */
    public function getXIGCapabilities() {
        return $this->X_IG_Capabilities;
    }

    /**
     * @return string
     */
    public function getXIGAppID() {
        return $this->X_IG_App_ID;
    }

    /**
     * @return string
     */
    public function getXMID() {
        return $this->X_MID;
    }

    /**
     * @return string
     */
    public function getXFBHTTPEngine() {
        return $this->X_FB_HTTP_Engine;
    }


    /**
     * @param string $X_IG_App_Locale
     */
    public function setXIGAppLocale($X_IG_App_Locale) {
        $this->X_IG_App_Locale = $X_IG_App_Locale;
    }

    /**
     * @param string $X_IG_Device_Locale
     */
    public function setXIGDeviceLocale($X_IG_Device_Locale) {
        $this->X_IG_Device_Locale = $X_IG_Device_Locale;
    }

    /**
     * @param string $X_IG_Mapped_Locale
     */
    public function setXIGMappedLocale($X_IG_Mapped_Locale) {
        $this->X_IG_Mapped_Locale = $X_IG_Mapped_Locale;
    }

    /**
     * @param string $X_Pigeon_Session_Id
     */
    public function setXPigeonSessionId($X_Pigeon_Session_Id) {
        $this->X_Pigeon_Session_Id = $X_Pigeon_Session_Id;
    }

    /**
     * @param string $X_Pigeon_Rawclienttime
     */
    public function setXPigeonRawclienttime($X_Pigeon_Rawclienttime) {
        $this->X_Pigeon_Rawclienttime = $X_Pigeon_Rawclienttime;
    }

    /**
     * @param string $X_IG_Connection_Speed
     */
    public function setXIGConnectionSpeed($X_IG_Connection_Speed) {
        $this->X_IG_Connection_Speed = $X_IG_Connection_Speed;
    }

    /**
     * @param string $X_IG_Bandwidth_Speed_KBPS
     */
    public function setXIGBandwidthSpeedKBPS($X_IG_Bandwidth_Speed_KBPS) {
        $this->X_IG_Bandwidth_Speed_KBPS = $X_IG_Bandwidth_Speed_KBPS;
    }

    /**
     * @param string $X_IG_Bandwidth_TotalBytes_B
     */
    public function setXIGBandwidthTotalBytesB($X_IG_Bandwidth_TotalBytes_B) {
        $this->X_IG_Bandwidth_TotalBytes_B = $X_IG_Bandwidth_TotalBytes_B;
    }

    /**
     * @param string $X_IG_Bandwidth_TotalTime_MS
     */
    public function setXIGBandwidthTotalTimeMS($X_IG_Bandwidth_TotalTime_MS) {
        $this->X_IG_Bandwidth_TotalTime_MS = $X_IG_Bandwidth_TotalTime_MS;
    }

    /**
     * @param string $X_IG_App_Startup_Country
     */
    public function setXIGAppStartupCountry($X_IG_App_Startup_Country) {
        $this->X_IG_App_Startup_Country = $X_IG_App_Startup_Country;
    }

    /**
     * @param string $X_Bloks_Version_Id
     */
    public function setXBloksVersionId($X_Bloks_Version_Id) {
        $this->X_Bloks_Version_Id = $X_Bloks_Version_Id;
    }

    /**
     * @param string $X_IG_WWW_Claim
     */
    public function setXIGWWWClaim($X_IG_WWW_Claim) {
        $this->X_IG_WWW_Claim = $X_IG_WWW_Claim;
    }

    /**
     * @param bool $X_Bloks_Is_Layout_RTL
     */
    public function setXBloksIsLayoutRTL($X_Bloks_Is_Layout_RTL) {
        $this->X_Bloks_Is_Layout_RTL = $X_Bloks_Is_Layout_RTL;
    }

    /**
     * @param string $X_IG_Device_ID
     */
    public function setXIGDeviceID($X_IG_Device_ID) {
        $this->X_IG_Device_ID = $X_IG_Device_ID;
    }

    /**
     * @param string $X_IG_Android_ID
     */
    public function setXIGAndroidID($X_IG_Android_ID) {
        $this->X_IG_Android_ID = $X_IG_Android_ID;
    }

    /**
     * @param string $X_IG_Connection_Type
     */
    public function setXIGConnectionType($X_IG_Connection_Type) {
        $this->X_IG_Connection_Type = $X_IG_Connection_Type;
    }

    /**
     * @param string $X_IG_Capabilities
     */
    public function setXIGCapabilities($X_IG_Capabilities) {
        $this->X_IG_Capabilities = $X_IG_Capabilities;
    }

    /**
     * @param string $X_IG_App_ID
     */
    public function setXIGAppID($X_IG_App_ID) {
        $this->X_IG_App_ID = $X_IG_App_ID;
    }

    /**
     * @param string $X_MID
     */
    public function setXMID($X_MID) {
        $this->X_MID = $X_MID;
    }

    /**
     * @param string $X_FB_HTTP_Engine
     */
    public function setXFBHTTPEngine($X_FB_HTTP_Engine) {
        $this->X_FB_HTTP_Engine = $X_FB_HTTP_Engine;
    }


}
