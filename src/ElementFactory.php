<?php

namespace Spanky\Former;

use Spanky\Former\Elements\HiddenInput;
use Spanky\Former\Elements\Input;
use Spanky\Former\Elements\Select;

/**
 * Class ElementFactory
 *
 * @package Spanky\Former
 */
class ElementFactory
{
    /**
     * Create a new Input element.
     *
     * @param  string $name
     * @param  string|null $value
     * @param  array $attributes
     * @return Input
     */
    public function text($name, $value = null, $attributes = [])
    {
        return new Input($name, $value, $attributes);
    }

    /**
     * Create a new HiddenInput element.
     *
     * @param  string $name
     * @param  string|null $value
     * @param  array $attributes
     * @return Input
     */
    public function hidden($name, $value = null, $attributes = [])
    {
        return new HiddenInput($name, $value, $attributes);
    }

    /**
     * Create a new Select element.
     *
     * @param  string $name
     * @param  array $options
     * @param  string|null $value
     * @param  array $attributes
     * @return Input
     */
    public function select($name, $options, $value = null, $attributes = [])
    {
        return new Select($name, $options, $value, $attributes);
    }
}
