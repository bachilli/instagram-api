<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class FriendshipModel
 *
 * @method bool hasBlocking()
 * @method bool isBlocking()
 * @method bool getBlocking()
 * @method $this setBlocking(bool $value)
 * @method $this unsetBlocking()
 * @method bool hasFollowedBy()
 * @method bool isFollowedBy()
 * @method bool getFollowedBy()
 * @method $this setFollowedBy(bool $value)
 * @method $this unsetFollowedBy()
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
 * @method bool hasMuting()
 * @method bool isMuting()
 * @method bool getMuting()
 * @method $this setMuting(bool $value)
 * @method $this unsetMuting()
 * @method bool hasOutgoingRequest()
 * @method bool isOutgoingRequest()
 * @method bool getOutgoingRequest()
 * @method $this setOutgoingRequest(bool $value)
 * @method $this unsetOutgoingRequest()
 *
 * @package InstagramFollowers\Response\Models
 */
class FriendshipModel extends Response {

    const JSON_PROPERTY_MAP = [
        "following" => "bool",
        "followed_by" => "bool",
        "blocking" => "bool",
        "muting" => "bool",
        "is_private" => "bool",
        "incoming_request" => "bool",
        "outgoing_request" => "bool",
        "is_bestie" => "bool",
        "is_restricted" => "bool"
    ];
}
