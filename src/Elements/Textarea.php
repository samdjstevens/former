<?php

namespace Spanky\Former\Elements;

use Spanky\Former\FormElement;

class Textarea extends AbstractFormElement implements FormElement
{
    /**
     * The default attributes of the element.
     *
     * @var array
     */
    protected $attributes = [
        'rows' => 5,
        'cols' => 20
    ];

    /**
     * Textareas don't use the value attribute,
     * so do nothing.
     *
     * @param  string $value
     * @return $this
     */
    public function setValueAttribute($value)
    {
        return $this;
    }

    /**
     * Returns the compiled HTML for the element.
     *
     * @return string
     */
    public function build()
    {
        return '<textarea' . $this->serializeAttributes() . '>' . $this->value . '</textarea>';
    }
}
