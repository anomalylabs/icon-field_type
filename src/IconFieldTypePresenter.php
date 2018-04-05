<?php namespace Anomaly\IconFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Collective\Html\HtmlBuilder;

/**
 * Class IconFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class IconFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var IconFieldType
     */
    protected $object;

    /**
     * Create a new IconFieldTypePresenter instance.
     *
     * @param mixed       $object
     * @param HtmlBuilder $html
     */
    public function __construct($object, HtmlBuilder $html)
    {
        parent::__construct($object);

        $this->html = $html;
    }

    /**
     * Return the icon html.
     *
     * @param       $class
     * @param array $attributes
     * @return string
     */
    public function html(array $attributes = [])
    {
        $attributes['class'] = join(' ', array_filter([$this->object->getValue(), array_get($attributes, 'class')]));

        $attributes = $this->html->attributes($attributes);

        return '<i ' . $attributes . '></i>';
    }

    /**
     * Return the icon HTML by default.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->html();
    }

}
