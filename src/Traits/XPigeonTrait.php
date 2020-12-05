<?php

namespace InstagramFollowers\Traits;

trait XPigeonTrait {
    use GenerateUUIDV4Trait;

    public function generate_Rawclienttime() {
        return number_format(time() / 1000, 3, '.', '');
    }

    public function generate_Session_Id() {
        return $this->generateUUID(true);
    }
}
