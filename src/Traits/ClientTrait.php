<?php

namespace InstagramFollowers\Traits;

use InstagramFollowers\Client;

/**
 * Trait ClientTrait
 *
 * @package InstagramFollowers\Traits
 */
trait ClientTrait {

    /**
     * @var $client Client
     */
    public $client;

    /**
     * ClientTrait constructor.
     * @param Client $client
     */
    public function __construct($client) {
        $this->client = $client;
    }


    /**
     * @return Client
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient($client) {
        $this->client = $client;
    }


}