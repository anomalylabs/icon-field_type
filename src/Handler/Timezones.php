<?php namespace Anomaly\IconFieldType\Handler;

use Anomaly\IconFieldType\IconFieldType;

/**
 * Class Timezones
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class Timezones
{

    /**
     * Handle the options.
     *
     * @param IconFieldType $fieldType
     */
    public function handle(IconFieldType $fieldType)
    {
        $fieldType->setOptions(array_combine(timezone_identifiers_list(), timezone_identifiers_list()));
    }
}
