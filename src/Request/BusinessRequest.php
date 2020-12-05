<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class BusinessRequest {
    use ClientTrait;

    /**
     * @var $get_monetization_products_eligibility_dataResponse Response|null
     */
    public $get_monetization_products_eligibility_dataResponse = null;
    /**
     * @var $should_require_professional_accountResponse Response|null
     */
    public $should_require_professional_accountResponse = null;

    public function get_monetization_products_eligibility_data() {
        $this->get_monetization_products_eligibility_dataResponse = $this->client->request("/business/eligibility/get_monetization_products_eligibility_data/", Response::class)
            ->needAuthorization(true)
            ->addParam('product_types', 'branded_content')
            ->get();
        return $this->get_monetization_products_eligibility_dataResponse;
    }

    public function should_require_professional_account() {
        $this->should_require_professional_accountResponse = $this->client->request("/business/branded_content/should_require_professional_account/", Response::class)
            ->needAuthorization(true)
            ->addParam('product_types', 'branded_content')
            ->get();
        return $this->should_require_professional_accountResponse;
    }


}
