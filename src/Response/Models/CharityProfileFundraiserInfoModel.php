<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class CharityProfileFundraiserInfoModel
 *
 * @method bool hasConsumptionSheetConfig()
 * @method bool isConsumptionSheetConfig()
 * @method \InstagramFollowers\Response\Models\ConsumptionSheetConfigModel getConsumptionSheetConfig()
 * @method $this setConsumptionSheetConfig(\InstagramFollowers\Response\Models\ConsumptionSheetConfigModel $value)
 * @method $this unsetConsumptionSheetConfig()
 * @method bool hasHasActiveFundraiser()
 * @method bool isHasActiveFundraiser()
 * @method bool getHasActiveFundraiser()
 * @method $this setHasActiveFundraiser(bool $value)
 * @method $this unsetHasActiveFundraiser()
 * @method bool hasIsFacebookOnboardedCharity()
 * @method bool isIsFacebookOnboardedCharity()
 * @method bool getIsFacebookOnboardedCharity()
 * @method $this setIsFacebookOnboardedCharity(bool $value)
 * @method $this unsetIsFacebookOnboardedCharity()
 * @method bool hasPk()
 * @method bool isPk()
 * @method int getPk()
 * @method $this setPk(int $value)
 * @method $this unsetPk()
 *
 * @package InstagramFollowers\Response\Models
 */
class CharityProfileFundraiserInfoModel extends Response {

    const JSON_PROPERTY_MAP = [
        "pk"=> "int",
         "is_facebook_onboarded_charity"=> "bool",
         "has_active_fundraiser"=> "bool",
         "consumption_sheet_config"=> "ConsumptionSheetConfigModel"
    ];
}
