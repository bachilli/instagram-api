<?php

namespace InstagramFollowers\Response;

use InstagramFollowers\Response;

/**
 * UserFeedResponse.
 *
 * @method bool hasAutoLoadMoreEnabled()
 * @method bool isAutoLoadMoreEnabled()
 * @method bool getAutoLoadMoreEnabled()
 * @method $this setAutoLoadMoreEnabled(bool $value)
 * @method $this unsetAutoLoadMoreEnabled()
 * @method bool hasItems()
 * @method bool isItems()
 * @method \InstagramFollowers\Response\Models\ItemModel[] getItems()
 * @method $this setItems(\InstagramFollowers\Response\Models\ItemModel[] $value)
 * @method $this unsetItems()
 * @method bool hasMaxId()
 * @method bool isMaxId()
 * @method string getMaxId()
 * @method $this setMaxId(string $value)
 * @method $this unsetMaxId()
 * @method bool hasMoreAvailable()
 * @method bool isMoreAvailable()
 * @method bool getMoreAvailable()
 * @method $this setMoreAvailable(bool $value)
 * @method $this unsetMoreAvailable()
 * @method bool hasNextMaxId()
 * @method bool isNextMaxId()
 * @method string getNextMaxId()
 * @method $this setNextMaxId(string $value)
 * @method $this unsetNextMaxId()
 * @method bool hasNumResults()
 * @method bool isNumResults()
 * @method int getNumResults()
 * @method $this setNumResults(int $value)
 * @method $this unsetNumResults()
 *
 */
class UserFeedResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'items'                  => 'Models\ItemModel[]',
        'num_results'            => 'int',
        'more_available'         => 'bool',
        'next_max_id'            => 'string',
        'max_id'                 => 'string',
        'auto_load_more_enabled' => 'bool',
    ];
}
