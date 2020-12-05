<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class BanyanRequest {
    use ClientTrait;

    /**
     * @var $banyanLastResponse Response|null
     */
    public $banyanLastResponse = null;

    /**
     * @return bool|Response
     */
    public function banyan() {
        $urlParam = ["direct_user_search_keypressed", "group_stories_share_sheet", "reshare_share_sheet", "story_share_sheet", "direct_user_search_nullstate", "threads_people_picker"];
        $urlStr = json_encode($urlParam);

        $this->banyanLastResponse = $this->client->request("/banyan/banyan/", Response::class)
            ->needAuthorization(true)
            ->addParam('views', $urlStr)
            ->get();
        return $this->banyanLastResponse;
    }


}
