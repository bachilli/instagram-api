<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class PreffilCandidatesModel
 *
 * @method bool hasSource()
 * @method bool isSource()
 * @method string getSource()
 * @method $this setSource(string $value)
 * @method $this unsetSource()
 * @method bool hasType()
 * @method bool isType()
 * @method string getType()
 * @method $this setType(string $value)
 * @method $this unsetType()
 * @method bool hasValue()
 * @method bool isValue()
 * @method string getValue()
 * @method $this setValue(string $value)
 * @method $this unsetValue()
 *
 * @package InstagramFollowers\Response\Models
 */
class PreffilCandidatesModel extends Response {

    const JSON_PROPERTY_MAP = [
        "type" => "string",
        "value" => "string",
        "source" => "string"
    ];

}