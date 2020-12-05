<?php

namespace InstagramFollowers\Repositories;

/**
 * Class Repository
 * @package InstagramFollowers\Repositories
 */
class Repository {

    /**
     * @var $file_storage_dir string
     */
    protected $file_storage_dir;

    /**
     * Repository constructor.
     */
    public function __construct() {
        $this->file_storage_dir = __DIR__ . '/../loginSessions/';

    }

    /**
     * @return string
     */
    public function getFileStorageDir() {
        return realpath($this->file_storage_dir);
    }

    /**
     * @param $folderName string
     * @param $fileName string
     *
     * @return string
     */
    public function getFileName($folderName, $fileName) {
        return realpath($this->file_storage_dir) . '/' . $folderName . '/' . $fileName;
    }

    /**
     * @param $name string
     * @return bool
     */
    public function openFolder($name) {
        $path = realpath(__DIR__ . '/../') . '/loginSessions/' . $name;

        if ((is_dir($path) && is_writable($path))
            || (!is_dir($path) && mkdir($path, 0777, true))
            || chmod($path, 0777)) {
            return true;
        } else {
            return false;
        }


    }

    /**
     * @param $folder_name string
     * @param $filename string
     *
     * @return bool
     */
    public function file_exist($folder_name, $filename) {
        $path = realpath(__DIR__ . '/../') . '/loginSessions/' . $folder_name . '/' . $filename;
        return file_exists($path);
    }
}
