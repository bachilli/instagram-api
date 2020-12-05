<?php

namespace InstagramFollowers\Interfaces;

interface ModelInterface {

    /**
     * @return array
     */
    public function toJson();

    /**
     * @return array
     */
    public function toArray();

}
