<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class StatusRequest {
    use ClientTrait;
    /**
     * @var $get_viewable_statuses_response Response|null
     */
    public $get_viewable_statuses_response = null;

    public function get_viewable_statuses() {
        $this->get_viewable_statuses_response = $this->client->request("/status/get_viewable_statuses/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->get_viewable_statuses_response;
    }

}
