<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class Direct_v2Request {
    use ClientTrait;
    /**
     * @var $get_presence_response Response|null
     */
    public $get_presence_response = null;
    /**
     * @var $get_inbox_response Response|null
     */
    public $get_inbox_response = null;

    public function get_presence() {
        $this->get_presence_response = $this->client->request("/direct_v2/get_presence/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->get_presence_response;
    }

    public function get_Inbox($thread_message_limit = '10', $limit = '20', $persistentBadging = 'true', $visual_message_return_type = "unseen") {
        $req = $this->client->request("/direct_v2/inbox/", Response::class)
            ->needAuthorization(true)
            ->addParam('visual_message_return_type', $visual_message_return_type);
        if ($thread_message_limit !== null) {
            $req->addParam('thread_message_limit', $thread_message_limit);
        }
        $this->get_inbox_response = $req->addParam('persistentBadging', $persistentBadging)
            ->addParam('limit', $limit)
            ->get();
        return $this->get_inbox_response;
    }

}
