<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class QESyncParamsModel
 *
 * @method bool hasName()
 * @method bool isName()
 * @method string getName()
 * @method $this setName(string $value)
 * @method $this unsetName()
 * @method bool hasValue()
 * @method bool isValue()
 * @method string getValue()
 * @method $this setValue(string $value)
 * @method $this unsetValue()
 *
 * @package InstagramFollowers\Response\Models
 */
class QESyncParamsModel extends Response {

    const JSON_PROPERTY_MAP = [
        "name" => "string",
        "value" => "string"
    ];
}
