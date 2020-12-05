<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * LoginResponse.
 *
 * @method bool hasButtons()
 * @method bool isButtons()
 * @method mixed getButtons()
 * @method $this setButtons(mixed $value)
 * @method $this unsetButtons()
 * @method bool hasErrorTitle()
 * @method bool isErrorTitle()
 * @method string getErrorTitle()
 * @method $this setErrorTitle(string $value)
 * @method $this unsetErrorTitle()
 * @method bool hasErrorType()
 * @method bool isErrorType()
 * @method string getErrorType()
 * @method $this setErrorType(string $value)
 * @method $this unsetErrorType()
 * @method bool hasInvalidCredentials()
 * @method bool isInvalidCredentials()
 * @method bool getInvalidCredentials()
 * @method $this setInvalidCredentials(bool $value)
 * @method $this unsetInvalidCredentials()
 * @method bool hasLoggedInUser()
 * @method bool isLoggedInUser()
 * @method \InstagramFollowers\Response\Models\UserModel getLoggedInUser()
 * @method $this setLoggedInUser(\InstagramFollowers\Response\Models\UserModel $value)
 * @method $this unsetLoggedInUser()
 * @method bool hasPhoneVerificationSettings()
 * @method bool isPhoneVerificationSettings()
 * @method \InstagramFollowers\Response\Models\PhoneVerificationSettingsModel getPhoneVerificationSettings()
 * @method $this setPhoneVerificationSettings(\InstagramFollowers\Response\Models\PhoneVerificationSettingsModel $value)
 * @method $this unsetPhoneVerificationSettings()
 * @method bool hasTwoFactorInfo()
 * @method bool isTwoFactorInfo()
 * @method \InstagramFollowers\Response\Models\TwoFactorInfoModel getTwoFactorInfo()
 * @method $this setTwoFactorInfo(\InstagramFollowers\Response\Models\TwoFactorInfoModel $value)
 * @method $this unsetTwoFactorInfo()
 * @method bool hasTwoFactorRequired()
 * @method bool isTwoFactorRequired()
 * @method bool getTwoFactorRequired()
 * @method $this setTwoFactorRequired(bool $value)
 * @method $this unsetTwoFactorRequired()
 *
 */
class LoginResponse extends Response {
    const JSON_PROPERTY_MAP = [
        'logged_in_user' => 'Models\UserModel',
        "invalid_credentials" => "bool", //on wrong pass
        "error_title" => "string", //on wrong pass
        "buttons" => "mixed", //on wrong pass
        "error_type" => "string", //on wrong pass
        "two_factor_required" => "bool",
        "two_factor_info" => "Models\TwoFactorInfoModel",
        "phone_verification_settings" => "Models\PhoneVerificationSettingsModel"
    ];
}
