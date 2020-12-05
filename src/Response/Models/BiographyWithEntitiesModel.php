<?php


namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class BiographyWithEntitiesModel
 *
 * @method bool hasEntities()
 * @method bool isEntities()
 * @method mixed getEntities()
 * @method $this setEntities(mixed $value)
 * @method $this unsetEntities()
 * @method bool hasRawText()
 * @method bool isRawText()
 * @method string getRawText()
 * @method $this setRawText(string $value)
 * @method $this unsetRawText()
 *
 * @package InstagramFollowers\Response\Models
 */
class BiographyWithEntitiesModel extends Response {

    const JSON_PROPERTY_MAP = [
        "raw_text"=> "string",
         "entities"=> "mixed"
    ];
}
