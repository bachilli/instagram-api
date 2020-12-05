<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class ProfileContextLinksWithUserIdsModel
 *
 * @method bool hasEnd()
 * @method bool isEnd()
 * @method int getEnd()
 * @method $this setEnd(int $value)
 * @method $this unsetEnd()
 * @method bool hasStart()
 * @method bool isStart()
 * @method int getStart()
 * @method $this setStart(int $value)
 * @method $this unsetStart()
 * @method bool hasUsername()
 * @method bool isUsername()
 * @method string getUsername()
 * @method $this setUsername(string $value)
 * @method $this unsetUsername()
 *
 * @package InstagramFollowers\Response\Models
 */
class ProfileContextLinksWithUserIdsModel extends Response {

    const JSON_PROPERTY_MAP = [
        "start" => "int",
        "end" => "int",
        "username" => "string"
    ];

}
