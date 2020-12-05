<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class MultipleAccountsRequest {
    use ClientTrait;

    /**
     * @var $get_account_family_response Response|null
     */
    public $get_account_family_response = null;
    /**
     * @var $get_linkage_status_response Response|null
     */
    public $get_linkage_status_response = null;

    public function get_account_family() {
        $this->get_account_family_response = $this->client->request("/multiple_accounts/get_account_family/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->get_account_family_response;
    }

    public function get_linkage_status() {
        $this->get_linkage_status_response = $this->client->request("/linked_accounts/get_linkage_status/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->get_linkage_status_response;
    }

}
