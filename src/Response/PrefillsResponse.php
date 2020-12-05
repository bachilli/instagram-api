<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class PrefillsResponse
 *
 * @method bool hasPrefills()
 * @method bool isPrefills()
 * @method \InstagramFollowers\Response\Models\PrefillsModel getPrefills()
 * @method $this setPrefills(\InstagramFollowers\Response\Models\PrefillsModel $value)
 * @method $this unsetPrefills()
 *
 * @package InstagramFollowers\Response
 */
class PrefillsResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "prefills" => "Models\PrefillsModel"
    ];
}
