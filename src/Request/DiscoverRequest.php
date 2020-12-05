<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\GenerateUUIDV4Trait;

class DiscoverRequest {
    use ClientTrait;
    use GenerateUUIDV4Trait;
    /**
     * @var $topical_explore_response Response|null
     */
    public $topical_explore_response= null;

    public function topical_explore($is_prefetch = "true", $omit_cover_media = "true", $use_sectional_payload = "true",
                                    $timezone_offset = '-21600', $lat = '38.8944', $lng = '-77.07136',
                                    $include_fixed_destinations = "true") {
        $this->topical_explore_response= $this->client->request("/discover/topical_explore/", Response::class)
            ->needAuthorization(true)
            ->addParam('is_prefetch', $is_prefetch)
            ->addParam('omit_cover_media', $omit_cover_media)
            ->addParam('use_sectional_payload', $use_sectional_payload)
            ->addParam('timezone_offset', $timezone_offset)
            ->addParam('lat', $lat)
            ->addParam('lng', $lng)
            ->addParam('session_id', $this->generateUUID(true))
            ->addParam('include_fixed_destinations', $include_fixed_destinations)
            ->get();
        return $this->topical_explore_response;
    }


}

