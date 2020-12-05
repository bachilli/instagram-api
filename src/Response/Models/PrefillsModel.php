<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class PrefillsModel
 *
 * @method bool hasCandidates()
 * @method bool isCandidates()
 * @method \InstagramFollowers\Response\Models\PreffilCandidatesModel getCandidates()
 * @method $this setCandidates(\InstagramFollowers\Response\Models\PreffilCandidatesModel $value)
 * @method $this unsetCandidates()
 * @method bool hasUsage()
 * @method bool isUsage()
 * @method string getUsage()
 * @method $this setUsage(string $value)
 * @method $this unsetUsage()
 *
 * @package InstagramFollowers\Response\Models
 */
class PrefillsModel extends Response {

    const JSON_PROPERTY_MAP = [
        "usage" => "string",
        "candidates" => "PreffilCandidatesModel"
    ];
}