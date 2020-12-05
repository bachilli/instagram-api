<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class UploadImageResponse
 *
 * @method bool hasUploadId()
 * @method bool isUploadId()
 * @method string getUploadId()
 * @method $this setUploadId(string $value)
 * @method $this unsetUploadId()
 * @method bool hasXsharingNonces()
 * @method bool isXsharingNonces()
 * @method mixed getXsharingNonces()
 * @method $this setXsharingNonces(mixed $value)
 * @method $this unsetXsharingNonces()
 *
 * @package InstagramFollowers\Response
 */
class UploadImageResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "upload_id" => "string",
        "xsharing_nonces" => "mixed"
    ];

}
