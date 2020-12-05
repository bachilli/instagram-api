<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class QESyncResponse
 *
 * @method bool hasExperiments()
 * @method bool isExperiments()
 * @method \InstagramFollowers\Response\Models\QESyncResponseModel getExperiments()
 * @method $this setExperiments(\InstagramFollowers\Response\Models\QESyncResponseModel $value)
 * @method $this unsetExperiments()
 *
 * @package InstagramFollowers\Response
 */
class QESyncResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "experiments" => "Models\QESyncResponseModel"
    ];
}