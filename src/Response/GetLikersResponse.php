<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class GetLikersResponse
 *
 * @method bool hasUsers()
 * @method bool isUsers()
 * @method \InstagramFollowers\Response\Models\UserModel[] getUsers()
 * @method $this setUsers(\InstagramFollowers\Response\Models\UserModel[] $value)
 * @method $this unsetUsers()
 * @method bool hasUserCount()
 * @method bool isUserCount()
 * @method int getUserCount()
 * @method $this setUserCount(int $value)
 * @method $this unsetUserCount()
 *
 * @package InstagramFollowers\Response
 */
class GetLikersResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "users" => "Models\UserModel[]",
        "user_count" => "int"
    ];
}