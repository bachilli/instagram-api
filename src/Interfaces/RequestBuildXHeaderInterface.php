<?php

namespace InstagramFollowers\Interfaces;

interface RequestBuildXHeaderInterface extends ModelInterface {

    /**
     * @return ModelInterface
     */
    public function getHeaders();
}
