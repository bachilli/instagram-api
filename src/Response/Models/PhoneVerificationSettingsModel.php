<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class PhoneVerificationSettingsModel
 *
 * @method bool hasMaxSmsCount()
 * @method bool isMaxSmsCount()
 * @method int getMaxSmsCount()
 * @method $this setMaxSmsCount(int $value)
 * @method $this unsetMaxSmsCount()
 * @method bool hasResendSmsDelaySec()
 * @method bool isResendSmsDelaySec()
 * @method int getResendSmsDelaySec()
 * @method $this setResendSmsDelaySec(int $value)
 * @method $this unsetResendSmsDelaySec()
 * @method bool hasRobocallAfterMaxSms()
 * @method bool isRobocallAfterMaxSms()
 * @method bool getRobocallAfterMaxSms()
 * @method $this setRobocallAfterMaxSms(bool $value)
 * @method $this unsetRobocallAfterMaxSms()
 * @method bool hasRobocallCountDownTimeSec()
 * @method bool isRobocallCountDownTimeSec()
 * @method int getRobocallCountDownTimeSec()
 * @method $this setRobocallCountDownTimeSec(int $value)
 * @method $this unsetRobocallCountDownTimeSec()
 *
 * @package InstagramFollowers\Response\Models
 */
class PhoneVerificationSettingsModel extends Response {

    const JSON_PROPERTY_MAP = [
        "max_sms_count"=> "int",
         "resend_sms_delay_sec"=> "int",
         "robocall_count_down_time_sec"=> "int",
         "robocall_after_max_sms"=> "bool"
    ];
}
