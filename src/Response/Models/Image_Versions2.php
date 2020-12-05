<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class Image_Versions2
 *
 * @method bool hasCandidates()
 * @method bool isCandidates()
 * @method \InstagramFollowers\Response\Models\ProfilePictureModel[] getCandidates()
 * @method $this setCandidates(\InstagramFollowers\Response\Models\ProfilePictureModel[] $value)
 * @method $this unsetCandidates()
 *
 * @package InstagramFollowers\Response\Models
 */
class Image_Versions2 extends Response {
    const JSON_PROPERTY_MAP = [
        'candidates'  => 'ProfilePictureModel[]',
    ];
}