<?php namespace Anomaly\IconFieldType;

use Anomaly\IconFieldType\Handler\Countries;
use Anomaly\IconFieldType\Handler\Currencies;
use Anomaly\IconFieldType\Handler\Emails;
use Anomaly\IconFieldType\Handler\Layouts;
use Anomaly\IconFieldType\Handler\States;
use Anomaly\IconFieldType\Handler\Timezones;
use Anomaly\IconFieldType\Handler\Years;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Asset\Asset;
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
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'mode' => 'dropdown',
    ];

    /**
     * Get the dropdown options.
     *
     * @return array
     */
    public function getOptions()
    {
        /* @var Asset $asset */
        $asset = app(Asset::class);

        $contents = file_get_contents(public_path($asset->path('anomaly.field_type.icon::css/fontawesome-all.min.css', ['noversion'])));

        preg_match_all("/\.fa\-([a-z0-9-]+):before{/", $contents, $matches);

        return [
            'Font Awesome' => $matches[1]
        ];
    }

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
}
