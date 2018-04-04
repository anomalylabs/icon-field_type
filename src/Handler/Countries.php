<?php namespace Anomaly\IconFieldType\Handler;

use Anomaly\IconFieldType\IconFieldType;
use Illuminate\Contracts\Config\Repository;

/**
 * Class Countries
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class Countries
{

    /**
     * Handle the options.
     *
     * @param IconFieldType $fieldType
     * @param Repository      $config
     */
    public function handle(IconFieldType $fieldType, Repository $config)
    {
        $fieldType->setOptions(
            array_combine(
                array_keys($config->get('streams::countries.available')),
                array_map(
                    function ($country) {
                        return $country['name'];
                    },
                    $config->get('streams::countries.available')
                )
            )
        );
    }
}
