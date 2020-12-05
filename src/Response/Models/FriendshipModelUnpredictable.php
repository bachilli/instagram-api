<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class FriendshipModel
 *
 * @method bool hasFollowing()
 * @method bool isFollowing()
 * @method bool getFollowing()
 * @method $this setFollowing(bool $value)
 * @method $this unsetFollowing()
 * @method bool hasIncomingRequest()
 * @method bool isIncomingRequest()
 * @method bool getIncomingRequest()
 * @method $this setIncomingRequest(bool $value)
 * @method $this unsetIncomingRequest()
 * @method bool hasIsBestie()
 * @method bool isIsBestie()
 * @method bool getIsBestie()
 * @method $this setIsBestie(bool $value)
 * @method $this unsetIsBestie()
 * @method bool hasIsPrivate()
 * @method bool isIsPrivate()
 * @method bool getIsPrivate()
 * @method $this setIsPrivate(bool $value)
 * @method $this unsetIsPrivate()
 * @method bool hasIsRestricted()
 * @method bool isIsRestricted()
 * @method bool getIsRestricted()
 * @method $this setIsRestricted(bool $value)
 * @method $this unsetIsRestricted()
 * @method bool hasOutgoingRequest()
 * @method bool isOutgoingRequest()
 * @method bool getOutgoingRequest()
 * @method $this setOutgoingRequest(bool $value)
 * @method $this unsetOutgoingRequest()
 * @method bool hasUserPk()
 * @method bool isUserPk()
 * @method string getUserPk()
 * @method $this setUserPk(string $value)
 * @method $this unsetUserPk()
 *
 * @package InstagramFollowers\Response\Models
 */
class FriendshipModelUnpredictable extends Response {

    const JSON_PROPERTY_MAP = [
        "user_pk" => "string",
        "following" => "bool",
        "incoming_request" => "bool",
        "is_bestie" => "bool",
        "is_private" => "bool",
        "is_restricted" => "bool",
        "outgoing_request" => "bool"
    ];
}
