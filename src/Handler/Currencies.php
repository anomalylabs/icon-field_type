<?php namespace Anomaly\IconFieldType\Handler;

use Anomaly\IconFieldType\IconFieldType;
use Illuminate\Contracts\Config\Repository;

/**
 * Class Currencies
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class Currencies
{

    /**
     * Handle the options.
     *
     * @param IconFieldType $fieldType
     * @param Repository      $config
     */
    public function handle(IconFieldType $fieldType, Repository $config)
    {
        $currencies = array_values($config->get('streams::currencies.enabled'));

        $fieldType->setOptions(
            array_combine(
                $currencies,
                $currencies
            )
        );
    }
}
