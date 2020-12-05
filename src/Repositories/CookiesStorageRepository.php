<?php

namespace InstagramFollowers\Repositories;

use InstagramFollowers\Interfaces\CookiesStorageInterface;

class CookiesStorageRepository extends Repository implements CookiesStorageInterface {

    public function saveCookies($username, $cookies) {
        if ($this->openFolder($username) === true) {
            $fileName = $this->getFileName($username, 'session_cookies.json');
            $jsonString = json_encode($cookies);
            $result = file_put_contents($fileName, $jsonString);
            return ($result === false) ? false : true;
        }
        return false;
    }

    public function readCookies($username) {
        if ($this->openFolder($username) === true) {
            $fileName = $this->getFileName($username, 'session_cookies.json');
            $fileData = file_get_contents($fileName);
            $jsonObject = json_decode($fileData, true);
            if (is_array($jsonObject) === true) {
                return $jsonObject;
            } else {
                return [];
            }
        }
        return [];
    }

    public function cookiesExist($username) {
        return $this->file_exist($username, 'session_cookies.json');
    }




}
