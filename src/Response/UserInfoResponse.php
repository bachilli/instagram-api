<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class UserInfoResponse
 *
 * @method bool hasUser()
 * @method bool isUser()
 * @method \InstagramFollowers\Response\Models\UserModel getUser()
 * @method $this setUser(\InstagramFollowers\Response\Models\UserModel $value)
 * @method $this unsetUser()
 *
 * @package InstagramFollowers\Response
 */
class UserInfoResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "user" => "Models\UserModel"
    ];
}
