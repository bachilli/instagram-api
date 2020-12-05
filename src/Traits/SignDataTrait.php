<?php

namespace InstagramFollowers\Traits;

use InstagramFollowers\Constants\InstagramConstants;

Trait SignDataTrait {
    /**
     * Generate a keyed hash value using the HMAC method.
     *
     * @param string $data
     *
     * @return string
     */
    public function generateSigned_body($data) {
        $signature = hash_hmac('sha256', $data, InstagramConstants::IG_SIG_KEY);

        return sprintf("%s.%s", $signature, $data);
    }

    public function generateSignedBodyFromArray($array){
        $dataStr = json_encode($array);
        return $this->generateSigned_body($dataStr);

    }

}
