<?php

namespace InstagramFollowers\Interfaces;

/**
 * Interface CookiesStorageInterface
 * @package InstagramFollowers\Interfaces
 */
interface CookiesStorageInterface {

    /**
     * @param $username string
     * @param $cookies array
     *
     * @return bool
     */
    public function saveCookies($username, $cookies);

    /**
     * @param $username string
     *
     * @return array
     */
    public function readCookies($username);

    /**
     * @param $username string
     *
     * @return bool
     */
    public function cookiesExist($username);

}
