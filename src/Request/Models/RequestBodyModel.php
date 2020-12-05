<?php

namespace InstagramFollowers\Request\Models;

use InstagramFollowers\Interfaces\ModelInterface;

/**
 * Class RequestBodyModel
 * @package InstagramFollowers\Request\Models
 */
class RequestBodyModel implements ModelInterface {

    /**
     * @var $name string
     */
    protected $name;

    /**
     * @var $value string
     */
    protected $value;

    /**
     * RequestBodyModel constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct($name = '', $value = '') {
        $this->name = $name;
        $this->value = urlencode($value);
    }


    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value) {
        $this->value = urlencode($value);
    }

    /**
     * @param $value string
     */
    public function setValueUrlEncode($value) {
        $this->value = urlencode($value);
    }

    /**
     * @return string
     */
    public function toJson() {
        return json_encode($this->toArray());
    }

    /**
     * @return array
     */
    public function toArray() {
        return [$this->name => $this->value];
    }
}
