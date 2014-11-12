<?php

namespace Spanky\Former\Elements;

use Spanky\Former\FormElement;

/**
 * Class HiddenInput
 *
 * @package Spanky\Former\Elements
 */
class HiddenInput extends Input implements FormElement
{
    /**
     * The attributes of the element.
     *
     * @var array
     */
    protected $attributes = [
        'type' => 'hidden'
    ];
}
