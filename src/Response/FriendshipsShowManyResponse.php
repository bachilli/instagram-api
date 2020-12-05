<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;
use InstagramFollowers\Response\Models\FriendshipModelUnpredictable;

/**
 * Class FriendshipsShowManyResponse
 *
 * @method bool hasFriendshipStatuses()
 * @method bool isFriendshipStatuses()
 * @method $this setFriendshipStatuses(\InstagramFollowers\Response\Models\FriendshipModelUnpredictable[] $value)
 * @method $this unsetFriendshipStatuses()
 *
 * @package InstagramFollowers\Response
 */
class FriendshipsShowManyResponse extends Response {

    /**
     * @return FriendshipModelUnpredictable[]
     */
    public function getFriendshipStatuses(){
        $friendship_statuses = $this->_getProperty("friendship_statuses");
        $retFriendshipModelArray = [];
        foreach ($friendship_statuses as $friendship_status_key => $friendship_status) {
            $arrayIn = $friendship_status;
            $arrayIn['user_pk'] = $friendship_status_key;
            $retFriendshipModelArray[] = new Response\Models\FriendshipModelUnpredictable($arrayIn);
        }
        return $retFriendshipModelArray;
    }

    /**
     * @param $user_id int
     *
     * @return FriendshipModelUnpredictable|null
     */
    public function getFriendShipByPK($user_id){
        $friendship_statuses = $this->_getProperty("friendship_statuses");
        if (array_key_exists($user_id, $friendship_statuses) === true){
            $data = $friendship_statuses[$user_id];
            $data['user_pk'] = $user_id;
            return new FriendshipModelUnpredictable($data);
        }else{
            return null;
        }
    }
}
