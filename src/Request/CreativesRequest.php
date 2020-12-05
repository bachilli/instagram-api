<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

class CreativesRequest {
    use ClientTrait;
    use SignDataTrait;
    /**
     * @var $write_supported_capabilities_response Response|null
     */
    public $write_supported_capabilities_response = null;

    public function write_supported_capabilities() {
        $data = [
            "supported_capabilities_new" => '[{"name":"SUPPORTED_SDK_VERSIONS","value":"45.0,46.0,47.0,48.0,49.0,50.0,51.0,52.0,53.0,54.0,55.0,56.0,57.0,58.0,59.0,60.0,61.0,62.0,63.0,64.0,65.0,66.0,67.0,68.0,69.0,70.0,71.0,72.0,73.0,74.0,75.0,76.0,77.0,78.0,79.0,80.0,81.0,82.0,83.0,84.0"},{"name":"FACE_TRACKER_VERSION","value":"14"},{"name":"COMPRESSION","value":"ETC2_COMPRESSION"},{"name":"gyroscope","value":"gyroscope_enabled"}]',
            "_csrftoken" => $this->getClient()->get_csrt_token(),
            "_uid" => $this->getClient()->get_cookie_from_name('ds_user_id'),
            "_uuid" => $this->getClient()->getDeviceId(),

        ];
        $dataStr = json_encode($data);

        $this->write_supported_capabilities_response = $this->client->request("/creatives/write_supported_capabilities/", Response::class)
            ->needAuthorization(true)
            ->addParam('signed_body', $this->generateSigned_body($dataStr))
            ->addParam('ig_sig_key_version', InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->write_supported_capabilities_response;
    }


}
