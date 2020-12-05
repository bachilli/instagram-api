<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class CaptionModel
 *
@method bool hasBitFlags()
 * @method bool isBitFlags()
 * @method int getBitFlags()
 * @method $this setBitFlags(int $value)
 * @method $this unsetBitFlags()
 * @method bool hasContentType()
 * @method bool isContentType()
 * @method string getContentType()
 * @method $this setContentType(string $value)
 * @method $this unsetContentType()
 * @method bool hasCreatedAt()
 * @method bool isCreatedAt()
 * @method int getCreatedAt()
 * @method $this setCreatedAt(int $value)
 * @method $this unsetCreatedAt()
 * @method bool hasCreatedAtUtc()
 * @method bool isCreatedAtUtc()
 * @method int getCreatedAtUtc()
 * @method $this setCreatedAtUtc(int $value)
 * @method $this unsetCreatedAtUtc()
 * @method bool hasDidReportAsSpam()
 * @method bool isDidReportAsSpam()
 * @method bool getDidReportAsSpam()
 * @method $this setDidReportAsSpam(bool $value)
 * @method $this unsetDidReportAsSpam()
 * @method bool hasMediaId()
 * @method bool isMediaId()
 * @method int getMediaId()
 * @method $this setMediaId(int $value)
 * @method $this unsetMediaId()
 * @method bool hasPk()
 * @method bool isPk()
 * @method int getPk()
 * @method $this setPk(int $value)
 * @method $this unsetPk()
 * @method bool hasShareEnabled()
 * @method bool isShareEnabled()
 * @method bool getShareEnabled()
 * @method $this setShareEnabled(bool $value)
 * @method $this unsetShareEnabled()
 * @method bool hasStatus()
 * @method bool isStatus()
 * @method string getStatus()
 * @method $this setStatus(string $value)
 * @method $this unsetStatus()
 * @method bool hasText()
 * @method bool isText()
 * @method string getText()
 * @method $this setText(string $value)
 * @method $this unsetText()
 * @method bool hasType()
 * @method bool isType()
 * @method int getType()
 * @method $this setType(int $value)
 * @method $this unsetType()
 * @method bool hasUser()
 * @method bool isUser()
 * @method \InstagramFollowers\Response\Models\UserModel getUser()
 * @method $this setUser(\InstagramFollowers\Response\Models\UserModel $value)
 * @method $this unsetUser()
 * @method bool hasUserId()
 * @method bool isUserId()
 * @method int getUserId()
 * @method $this setUserId(int $value)
 * @method $this unsetUserId()
 *
 * @package InstagramFollowers\Response\Models
 */
class CaptionModel extends Response {

    const JSON_PROPERTY_MAP = [
        "pk" => "int",
        "user_id" => "int",
        "text" => "string",
        "type" => "int",
        "created_at" => "int",
        "created_at_utc" => "int",
        "content_type" => "string",
        "status" => "string",
        "bit_flags" => "int",
        "did_report_as_spam" => "bool",
        "share_enabled" => "bool",
        "user" => "UserModel",
        "media_id" => "int"
    ];
}
