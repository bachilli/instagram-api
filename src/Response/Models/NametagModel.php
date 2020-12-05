<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class NametagModel
 *
 * @method bool hasEmoji()
 * @method bool isEmoji()
 * @method string getEmoji()
 * @method $this setEmoji(string $value)
 * @method $this unsetEmoji()
 * @method bool hasEmojiColor()
 * @method bool isEmojiColor()
 * @method string getEmojiColor()
 * @method $this setEmojiColor(string $value)
 * @method $this unsetEmojiColor()
 * @method bool hasGradient()
 * @method bool isGradient()
 * @method string getGradient()
 * @method $this setGradient(string $value)
 * @method $this unsetGradient()
 * @method bool hasMode()
 * @method bool isMode()
 * @method int getMode()
 * @method $this setMode(int $value)
 * @method $this unsetMode()
 * @method bool hasSelfieSticker()
 * @method bool isSelfieSticker()
 * @method string getSelfieSticker()
 * @method $this setSelfieSticker(string $value)
 * @method $this unsetSelfieSticker()
 *
 * @package InstagramFollowers\Response\Models
 */
class NametagModel extends Response {

    const JSON_PROPERTY_MAP = [
        "mode" => "int",
        "gradient" => "string",
        "emoji" => "string",
        "emoji_color" => "string",
        "selfie_sticker" => "string"
    ];
}