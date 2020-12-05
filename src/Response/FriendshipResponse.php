<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class FriendshipResponse
 *
 * @method bool hasFriendshipStatus()
 * @method bool isFriendshipStatus()
 * @method \InstagramFollowers\Response\Models\FriendshipModel getFriendshipStatus()
 * @method $this setFriendshipStatus(\InstagramFollowers\Response\Models\FriendshipModel $value)
 * @method $this unsetFriendshipStatus()

 *
 * @package InstagramFollowers\Response
 */
class FriendshipResponse extends Response{

    const JSON_PROPERTY_MAP = [
        'friendship_status' => "Models\FriendshipModel"
    ];

}
