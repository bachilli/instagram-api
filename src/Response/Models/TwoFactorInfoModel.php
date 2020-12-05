<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class TwoFactorInfoModel
 *
 * @method bool hasObfuscatedPhoneNumber()
 * @method bool isObfuscatedPhoneNumber()
 * @method string getObfuscatedPhoneNumber()
 * @method $this setObfuscatedPhoneNumber(string $value)
 * @method $this unsetObfuscatedPhoneNumber()
 * @method bool hasPhoneVerificationSettings()
 * @method bool isPhoneVerificationSettings()
 * @method \InstagramFollowers\Response\Models\PhoneVerificationSettingsModel getPhoneVerificationSettings()
 * @method $this setPhoneVerificationSettings(\InstagramFollowers\Response\Models\PhoneVerificationSettingsModel $value)
 * @method $this unsetPhoneVerificationSettings()
 * @method bool hasShowMessengerCodeOption()
 * @method bool isShowMessengerCodeOption()
 * @method bool getShowMessengerCodeOption()
 * @method $this setShowMessengerCodeOption(bool $value)
 * @method $this unsetShowMessengerCodeOption()
 * @method bool hasShowNewLoginScreen()
 * @method bool isShowNewLoginScreen()
 * @method bool getShowNewLoginScreen()
 * @method $this setShowNewLoginScreen(bool $value)
 * @method $this unsetShowNewLoginScreen()
 * @method bool hasShowTrustedDeviceOption()
 * @method bool isShowTrustedDeviceOption()
 * @method bool getShowTrustedDeviceOption()
 * @method $this setShowTrustedDeviceOption(bool $value)
 * @method $this unsetShowTrustedDeviceOption()
 * @method bool hasSmsTwoFactorOn()
 * @method bool isSmsTwoFactorOn()
 * @method bool getSmsTwoFactorOn()
 * @method $this setSmsTwoFactorOn(bool $value)
 * @method $this unsetSmsTwoFactorOn()
 * @method bool hasTotpTwoFactorOn()
 * @method bool isTotpTwoFactorOn()
 * @method bool getTotpTwoFactorOn()
 * @method $this setTotpTwoFactorOn(bool $value)
 * @method $this unsetTotpTwoFactorOn()
 * @method bool hasTwoFactorIdentifier()
 * @method bool isTwoFactorIdentifier()
 * @method string getTwoFactorIdentifier()
 * @method $this setTwoFactorIdentifier(string $value)
 * @method $this unsetTwoFactorIdentifier()
 * @method bool hasUsername()
 * @method bool isUsername()
 * @method string getUsername()
 * @method $this setUsername(string $value)
 * @method $this unsetUsername()
 *
 * @package InstagramFollowers\Response\Models
 */
class TwoFactorInfoModel extends Response {

    const JSON_PROPERTY_MAP = [
        "username" => "string",
        "sms_two_factor_on" => "bool",
        "totp_two_factor_on" => "bool",
        "obfuscated_phone_number" => "string",
        "two_factor_identifier" => "string",
        "show_messenger_code_option" => "bool",
        "show_new_login_screen" => "bool",
        "show_trusted_device_option" => "bool",
        "phone_verification_settings" => "PhoneVerificationSettingsModel"
    ];
}
