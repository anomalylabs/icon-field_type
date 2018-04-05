<?php namespace Anomaly\IconFieldType;

use Anomaly\IconFieldType\Listener\AddIconsAsset;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Event\Ready;

/**
 * Class IconFieldTypeServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class IconFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        Ready::class => [
            AddIconsAsset::class,
        ],
    ];
}
