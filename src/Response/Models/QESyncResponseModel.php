<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class QESyncResponseModel
 *
 * @method bool hasAdditionalParams()
 * @method bool isAdditionalParams()
 * @method mixed getAdditionalParams()
 * @method $this setAdditionalParams(mixed $value)
 * @method $this unsetAdditionalParams()
 * @method bool hasGroup()
 * @method bool isGroup()
 * @method string getGroup()
 * @method $this setGroup(string $value)
 * @method $this unsetGroup()
 * @method bool hasName()
 * @method bool isName()
 * @method string getName()
 * @method $this setName(string $value)
 * @method $this unsetName()
 * @method bool hasParams()
 * @method bool isParams()
 * @method \InstagramFollowers\Response\Models\QESyncParamsModel[] getParams()
 * @method $this setParams(\InstagramFollowers\Response\Models\QESyncParamsModel[] $value)
 * @method $this unsetParams()
 *
 * @package InstagramFollowers\Response\Models
 */
class QESyncResponseModel extends Response {

    const JSON_PROPERTY_MAP = [
        "name" => "string",
        "group" => "string",
        "additional_params" => "mixed",
        "params" => "QESyncParamsModel[]"
    ];
}
