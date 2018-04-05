<?php namespace Anomaly\IconFieldType;

use Anomaly\IconFieldType\Command\ReadOptions;
use Anomaly\IconFieldType\Handler\Countries;
use Anomaly\IconFieldType\Handler\Currencies;
use Anomaly\IconFieldType\Handler\Emails;
use Anomaly\IconFieldType\Handler\Layouts;
use Anomaly\IconFieldType\Handler\States;
use Anomaly\IconFieldType\Handler\Timezones;
use Anomaly\IconFieldType\Handler\Years;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class IconFieldType
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class IconFieldType extends FieldType
{

    use DispatchesJobs;

    /**
     * No default class.
     *
     * @var null
     */
    protected $class = null;

    /**
     * The input view.
     *
     * @var null|string
     */
    protected $inputView = null;

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.icon::filter';

    /**
     * The icon options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'mode' => 'dropdown',
    ];

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        if (!$this->placeholder && !$this->isRequired()) {
            return 'anomaly.field_type.icon::input.placeholder';
        }

        return $this->placeholder;
    }

    /**
     * Return the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        if ($view = parent::getInputView()) {
            return $view;
        }

        return 'anomaly.field_type.icon::' . $this->config('mode', 'dropdown');
    }

    /**
     * Get the class.
     *
     * @return null|string
     */
    public function getClass()
    {
        if ($class = parent::getClass()) {
            return $class;
        }

        return $this->config('mode') == 'dropdown'
            ? 'custom-icon form-control'
            : null;
    }

    /**
     * Get the dropdown options.
     *
     * @return array
     */
    public function getOptions()
    {
        $this->dispatch(new ReadOptions($this));

        return $this->options;
    }

    /**
     * Add options.
     *
     * @param       $set
     * @param array $options
     * @return $this
     */
    public function addOptions($set, array $options)
    {
        $this->options[$set] = $options;

        return $this;
    }
}
