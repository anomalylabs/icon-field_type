<?php namespace Anomaly\IconFieldType\Handler;

use Anomaly\IconFieldType\Command\ParseOptions;
use Anomaly\IconFieldType\IconFieldType;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class Options
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Options
{

    use DispatchesJobs;

    /**
     * Handle the icon options.
     *
     * @param  IconFieldType $fieldType
     */
    public function handle(IconFieldType $fieldType, Container $container)
    {
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        if ($options instanceof \Closure) {
            $options = $container->call($options);
        }

        $fieldType->setOptions((array)$options);
    }
}
