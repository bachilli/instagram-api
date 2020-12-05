<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class LocationModel
 *
 * @method bool hasAddress()
 * @method bool isAddress()
 * @method string getAddress()
 * @method $this setAddress(string $value)
 * @method $this unsetAddress()
 * @method bool hasCity()
 * @method bool isCity()
 * @method string getCity()
 * @method $this setCity(string $value)
 * @method $this unsetCity()
 * @method bool hasExternalSource()
 * @method bool isExternalSource()
 * @method string getExternalSource()
 * @method $this setExternalSource(string $value)
 * @method $this unsetExternalSource()
 * @method bool hasFacebookPlacesId()
 * @method bool isFacebookPlacesId()
 * @method int getFacebookPlacesId()
 * @method $this setFacebookPlacesId(int $value)
 * @method $this unsetFacebookPlacesId()
 * @method bool hasLat()
 * @method bool isLat()
 * @method float getLat()
 * @method $this setLat(float $value)
 * @method $this unsetLat()
 * @method bool hasLng()
 * @method bool isLng()
 * @method float getLng()
 * @method $this setLng(float $value)
 * @method $this unsetLng()
 * @method bool hasName()
 * @method bool isName()
 * @method string getName()
 * @method $this setName(string $value)
 * @method $this unsetName()
 * @method bool hasPk()
 * @method bool isPk()
 * @method int getPk()
 * @method $this setPk(int $value)
 * @method $this unsetPk()
 * @method bool hasShortName()
 * @method bool isShortName()
 * @method string getShortName()
 * @method $this setShortName(string $value)
 * @method $this unsetShortName()
 *
 * @package InstagramFollowers\Response\Models
 */
class LocationModel extends Response {

    const JSON_PROPERTY_MAP = [
        "pk" => "int",
        "name" => "string",
        "address" => "string",
        "city" => "string",
        "short_name" => "string",
        "lng" => "float",
        "lat" => "float",
        "external_source" => "string",
        "facebook_places_id" => "int"

    ];
}
