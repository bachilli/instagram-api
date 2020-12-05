<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class UploadMediaResponse
 *
 * @method bool hasMedia()
 * @method bool isMedia()
 * @method \InstagramFollowers\Response\Models\ItemModel getMedia()
 * @method $this setMedia(\InstagramFollowers\Response\Models\ItemModel $value)
 * @method $this unsetMedia()
 * @method bool hasUploadId()
 * @method bool isUploadId()
 * @method string getUploadId()
 * @method $this setUploadId(string $value)
 * @method $this unsetUploadId()
 *
 * @package InstagramFollowers\Response
 */
class ConfigureMediaResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "media" => "Models\ItemModel",
        "upload_id" => "string"
    ];
}
