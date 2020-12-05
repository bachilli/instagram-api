<?php

namespace InstagramFollowers;

use LazyJsonMapper\LazyJsonMapper;

class Response extends LazyJsonMapper {

    /** @var bool */
    const ALLOW_VIRTUAL_PROPERTIES = false;

    /** @var bool */
    const ALLOW_VIRTUAL_FUNCTIONS = true;

    /** @var bool */
    const USE_MAGIC_LOOKUP_CACHE = true;

    public function getMessage(){
        if ($this->_hasPropertyData("message") === true){
            return $this->_getProperty('message');
        }else{
            return '';
        }
    }

    public function getStatus(){
        if ($this->_hasPropertyData("status") === true){
            return $this->_getProperty('status');
        }else{
            return 'fail';
        }
    }

}
