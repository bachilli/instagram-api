<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class NewsRequest {
    use ClientTrait;

    /**
     * @var $inbox_response Response|null
     */
    public $inbox_response = null;

    /**
     * @return bool|Response
     */
    public function inbox() {
        $this->inbox_response = $this->client->request("/news/inbox/", Response::class)
            ->needAuthorization(true)
            ->addParam('mark_as_seen', "false")
            ->get();
        return $this->inbox_response;
    }

}
