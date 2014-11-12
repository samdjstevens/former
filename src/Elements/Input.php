<?php

namespace Spanky\Former\Elements;

use Spanky\Former\FormElement;

/**
 * Class Input
 *
 * @package Spanky\Former\Elements
 */
class Input extends AbstractFormElement implements FormElement
{
    /**
     * The attributes of the element.
     *
     * @var array
     */
    protected $attributes = [
        'type' => 'text'
    ];

    /**
     * Compile the HTML string for this element.
     *
     * @return string
     */
    public function build()
    {
        return '<input' . $this->serializeAttributes() . '>';
    }
}
