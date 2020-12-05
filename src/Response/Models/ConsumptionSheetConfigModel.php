<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

class ConsumptionSheetConfigModel extends Response {

    const JSON_PROPERTY_MAP = [
        "can_viewer_donate" => "string",
        "currency" => "mixed",
        "donation_url" => "mixed",
        "privacy_disclaimer" => "mixed",
        "donation_disabled_message" => "string",
        "donation_amount_config" => "mixed"
    ];
}
