<?php

namespace InstagramFollowers\Repositories;

use InstagramFollowers\Interfaces\AuthorizationStorageInterface;

class AuthorizationStorageRepository extends Repository implements AuthorizationStorageInterface {

    public function saveAuthorization($username, $authorizationString) {
        if ($this->openFolder($username) === true) {
            $data = [
                'authorization' => $authorizationString
            ];
            $fileName = $this->getFileName($username, 'authorization.json');
            $jsonString = json_encode($data);
            $result = file_put_contents($fileName, $jsonString);
            return ($result === false) ? false : true;
        }
        return false;
    }


    public function readAuthorization($username) {
        if ($this->openFolder($username) === true && $this->is_valid_authorization($username) === true) {
            $fileName = $this->getFileName($username, 'authorization.json');
            $fileData = file_get_contents($fileName);
            $jsonObject = json_decode($fileData, true);
            if (is_array($jsonObject) === true) {
                return $jsonObject['authorization'];
            } else {
                return '';
            }

        }
        return '';
    }

    public function is_valid_authorization($username) {
        if ($this->file_exist($username, 'authorization.json') === true) {
            $fileName = $this->getFileName($username, 'authorization.json');
            $fileData = file_get_contents($fileName);
            $jsonObject = json_decode($fileData, true);
            if (is_array($jsonObject) === true) {
                return !$jsonObject['authorization'] == '';
            }
        }
        return false;
    }
}
