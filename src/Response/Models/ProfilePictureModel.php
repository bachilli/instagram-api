<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class ProfilePictureModel
 *
 ** @method bool hasEstimatedScansSizes()
 * @method bool isEstimatedScansSizes()
 * @method int[] getEstimatedScansSizes()
 * @method $this setEstimatedScansSizes(int[] $value)
 * @method $this unsetEstimatedScansSizes()
 * @method bool hasHeight()
 * @method bool isHeight()
 * @method int getHeight()
 * @method $this setHeight(int $value)
 * @method $this unsetHeight()
 * @method bool hasUrl()
 * @method bool isUrl()
 * @method string getUrl()
 * @method $this setUrl(string $value)
 * @method $this unsetUrl()
 * @method bool hasWidth()
 * @method bool isWidth()
 * @method int getWidth()
 * @method $this setWidth(int $value)
 * @method $this unsetWidth()
 *
 * @package InstagramFollowers\Response\Models
 */
class ProfilePictureModel extends Response {

    const JSON_PROPERTY_MAP = [
        "width" =>"int",
        "height" =>"int",
        "url" =>"string",
        "estimated_scans_sizes" =>"int[]",
    ];
}
