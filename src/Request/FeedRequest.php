<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Response\UserFeedResponse;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\GenerateUUIDV4Trait;

class FeedRequest {
    use ClientTrait;
    use GenerateUUIDV4Trait;
    /**
     * @var $reels_tray_response Response|null
     */
    public $reels_tray_response = null;
    /**
     * @var $feed_timeline_response Response|null
     */
    public $feed_timeline_response;
    /**
     * @var $getUserFeedLastResponse UserFeedResponse|Response|null
     */
    public $getUserFeedLastResponse;

    /**
     * Example for the preloaded_reel_ids = 1234567890,1234567890,1234567890
     * Example for the $preloaded_reel_timestamp = 1234567890,1234567890,1234567890
     *
     * @param $preloaded_reel_ids string
     * @param $preloaded_reel_timestamp string
     *
     * @return bool|Response
     */
    public function reels_tray($preloaded_reel_ids = '', $preloaded_reel_timestamp = '') {
        $supported_capabilities_new = [
            [
                "name" => "SUPPORTED_SDK_VERSIONS",
                "value" => "45.0,46.0,47.0,48.0,49.0,50.0,51.0,52.0,53.0,54.0,55.0,56.0,57.0,58.0,59.0,60.0,61.0,62.0,63.0,64.0,65.0,66.0,67.0,68.0,69.0,70.0,71.0,72.0,73.0,74.0,75.0,76.0,77.0,78.0,79.0,80.0,81.0,82.0,83.0,84.0"
            ],
            [
                "name" => "FACE_TRACKER_VERSION",
                "value" => "14"
            ],
            [
                "name" => "COMPRESSION", "value" => "ETC2_COMPRESSION"
            ],
            [
                "name" => "gyroscope", "value" => "gyroscope_enabled"
            ]
        ];
        $request = $this->client->request("/feed/reels_tray/", Response::class)
            ->needAuthorization(true)
            ->addParam('supported_capabilities_new', json_encode($supported_capabilities_new))
            ->addParam('reason', "cold_start")
            ->addParam('_csrftoken', $this->getClient()->get_csrt_token())
            ->addParam('_uuid', $this->getClient()->getDeviceId());
        if ($preloaded_reel_ids !== '' && $preloaded_reel_timestamp !== '') {
            $request->addParam('preloaded_reel_ids', $preloaded_reel_ids)
                ->addParam('preloaded_reel_timestamp', $preloaded_reel_timestamp);
        }
        $this->reels_tray_response = $request->post();
        return $this->reels_tray_response;

    }

    /**
     * $feed_view_info is here not used bcz i don't know
     * how these values are prepared for this request //TODO: Investigate on $feed_view_info
     *
     * example of $feed_view_info
     * [
     *  {
     *      "media_id": "2273660340738623197_4911805756",
     *      "version": 24,
     *      "media_pct": 1,
     *      "time_info": {
     *          "10": 1514,
     *          "25": 1412,
     *          "50": 1312,
     *          "75": 1210
     *      }
     *  }
     * ]
     *
     * @param $reason string
     * @param $feed_view_info array
     *
     * @return bool|Response
     */
    public function feed_timeline($reason = 'cold_start_fetch', $feed_view_info = []) {
        $this->feed_timeline_response = $this->client->request("/feed/timeline/", Response::class)
            ->needAuthorization(true)
            ->isCompressed(true)
            ->addParam('feed_view_info', "[]")
            ->addParam('phone_id', $this->getClient()->getPhoneId())
            ->addParam('reason', $reason)
            ->addParam('battery_level', 100)
            ->addParam('timezone_offset', "-21600")
            ->addParam('_csrftoken', $this->getClient()->get_csrt_token())
            ->addParam('device_id', $this->getClient()->getDeviceId())
            ->addParam('request_id', $this->generateUUID(true))
            ->addParam('is_pull_to_refresh', "0")
            ->addParam('_uuid', $this->getClient()->getDeviceId())
            ->addParam('is_charging', "1")
            ->addParam('is_dark_mode', "false")
            ->addParam('will_sound_on', "0")
            ->addParam('session_id', $this->generateUUID(true))
            ->addParam('bloks_versioning_id', "eacf6da5385f864af32eacb0b8c86530ef66ef1856961080bb20605e9d807f46")
            ->post();
        return $this->feed_timeline_response;
    }

    /**
     * @param $user_id int
     * @param $max_id int
     *
     * @return bool|Response|UserFeedResponse
     */
    public function getUserFeed($user_id, $max_id) {
        $req = $this->client->request("/feed/user/$user_id/", UserFeedResponse::class)
            ->needAuthorization(true)
            ->addParam('exclude_comment', "true");
        if ($max_id !== null) {
            $req->addParam('', '');
        }
        $this->getUserFeedLastResponse = $req->addParam('only_fetch_first_carousel_media', "false")->post();

        return $this->getUserFeedLastResponse;
    }

}
