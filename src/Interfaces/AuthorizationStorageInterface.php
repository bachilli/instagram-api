<?php

namespace InstagramFollowers\Interfaces;

interface AuthorizationStorageInterface {


    /**
     * @param $username string
     * @param $authorizationString string
     *
     * @return bool
     */
    public function saveAuthorization($username, $authorizationString);

    /**
     * @param $username string
     *
     * @return string
     */
    public function readAuthorization($username);

    /**
     * @param $username string
     *
     * @return bool
     */
    public function is_valid_authorization($username);
}