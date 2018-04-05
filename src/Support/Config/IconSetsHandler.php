<?php namespace Anomaly\IconFieldType\Support\Config;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;
use Illuminate\Contracts\Config\Repository;

/**
 * Class IconSetsHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class IconSetsHandler
{

    /**
     * Handle the options.
     *
     * @param CheckboxesFieldType $fieldType
     * @param Repository          $config
     */
    public function handle(CheckboxesFieldType $fieldType, Repository $config)
    {
        $icons = $config->get('anomaly.field_type.icon::icons');

        $fieldType->setOptions(
            array_combine(
                array_keys($icons),
                array_map(
                    function ($icons) {
                        return $icons['name'];
                    },
                    $icons
                )
            )
        );
    }
}
