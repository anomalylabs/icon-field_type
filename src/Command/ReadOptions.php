<?php namespace Anomaly\IconFieldType\Command;

use Anomaly\IconFieldType\IconFieldType;
use Anomaly\Streams\Platform\Asset\Asset;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Contracts\Config\Repository as Config;

/**
 * Class ReadOptions
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ReadOptions
{

    /**
     * The field type.
     *
     * @var IconFieldType
     */
    protected $fieldType;

    /**
     * Create a new ReadOptions instance.
     *
     * @param IconFieldType $fieldType
     */
    public function __construct(IconFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Config $config
     * @param Cache $cache
     * @param Asset $asset
     * @return
     */
    public function handle(Config $config, Cache $cache, Asset $asset)
    {
        $sets = $config->get($this->fieldType->getNamespace('icons'));

        if ($available = $this->fieldType->config('icon_sets', [])) {
            $sets = array_intersect_key($sets, array_flip($available));
        }

        return $cache->remember(
            md5(serialize($available)),
            60 * 24 * 7,
            function () use ($sets, $asset) {

                foreach ($sets as $set => $icons) {

                    preg_match_all(
                        "/{$icons['regex']}/",
                        file_get_contents(
                            public_path(
                                $asset->path(
                                    $icons['path'],
                                    ['noversion', 'min']
                                )
                            )
                        ),
                        $matches
                    );

                    $this->fieldType->addOptions(
                        $icons['name'],
                        array_combine(
                            array_map(
                                function ($icon) use ($icons) {
                                    return $icons['prefix'] . $icon;
                                },
                                $matches[1]
                            ),
                            $matches[1]
                        )
                    );
                }
            }
        );
    }
}
