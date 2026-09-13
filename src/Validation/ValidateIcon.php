<?php namespace Anomaly\IconFieldType\Validation;

use Anomaly\IconFieldType\IconFieldType;
use Illuminate\Support\Arr;

/**
 * Class ValidateIcon
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ValidateIcon
{

    /**
     * Handle the validation.
     *
     * @param IconFieldType $fieldType
     * @param               $value
     * @return bool
     */
    public function handle(IconFieldType $fieldType, $value)
    {
        if (!$value) {
            return true;
        }

        return in_array($value, array_keys(Arr::collapse($fieldType->getOptions())));
    }
}
