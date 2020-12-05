<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * Class GetBestiesResponse
 *
 * @method bool hasBigList()
 * @method bool isBigList()
 * @method bool getBigList()
 * @method $this setBigList(bool $value)
 * @method $this unsetBigList()
 * @method bool hasGlobalBlacklistSample()
 * @method bool isGlobalBlacklistSample()
 * @method mixed getGlobalBlacklistSample()
 * @method $this setGlobalBlacklistSample(mixed $value)
 * @method $this unsetGlobalBlacklistSample()
 * @method bool hasNextMaxId()
 * @method bool isNextMaxId()
 * @method mixed getNextMaxId()
 * @method $this setNextMaxId(mixed $value)
 * @method $this unsetNextMaxId()
 * @method bool hasPageSize()
 * @method bool isPageSize()
 * @method int getPageSize()
 * @method $this setPageSize(int $value)
 * @method $this unsetPageSize()
 * @method bool hasSections()
 * @method bool isSections()
 * @method mixed getSections()
 * @method $this setSections(mixed $value)
 * @method $this unsetSections()
 * @method bool hasUsers()
 * @method bool isUsers()
 * @method \InstagramFollowers\Response\Models\UserModel[] getUsers()
 * @method $this setUsers(\InstagramFollowers\Response\Models\UserModel[] $value)
 * @method $this unsetUsers()
 *
 * @package InstagramFollowers\Response
 */
class GetBestiesResponse extends Response {

    const JSON_PROPERTY_MAP = [
        "sections" => "mixed",
        "global_blacklist_sample" => "mixed",
        "users" => "Models\UserModel[]",
        "big_list" => "bool",
        "next_max_id" => "mixed",
        "page_size" => "int",
    ];
}
