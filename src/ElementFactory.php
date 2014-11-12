<?php

namespace Spanky\Former;

use Spanky\Former\Elements\Input;
use Spanky\Former\Elements\Select;
use Spanky\Former\Elements\Textarea;

/**
 * Class ElementFactory
 *
 * @package Spanky\Former
 */
class ElementFactory
{
    /**
     * Create a new Input element with type="text".
     *
     * @param  string $name
     * @param  string|null $value
     * @param  array $attributes
     * @return Input
     */
    public function text($name, $value = null, $attributes = [])
    {
        return new Input($name, $value, array_merge(['type' => 'text'], $attributes));
    }

    /**
     * Create a new Input element with type="hidden".
     *
     * @param  string $name
     * @param  string|null $value
     * @param  array $attributes
     * @return Input
     */
    public function hidden($name, $value = null, $attributes = [])
    {
        return new Input($name, $value, array_merge(['type' => 'hidden'], $attributes));
    }

    /**
     * Create a new Input element with type="email".
     *
     * @param  string $name
     * @param  string|null $value
     * @param  array $attributes
     * @return Input
     */
    public function email($name, $value = null, $attributes = [])
    {
        return new Input($name, $value, array_merge(['type' => 'email'], $attributes));
    }

    /**
     * Create a new Select element.
     *
     * @param  string $name
     * @param  array $options
     * @param  string|null $value
     * @param  array $attributes
     * @return Select
     */
    public function select($name, $options, $value = null, $attributes = [])
    {
        return new Select($name, $options, $value, $attributes);
    }

    /**
     * Create a new Textarea element.
     *
     * @param  string $name
     * @param  string|null $value
     * @param  array $attributes
     * @return Textarea
     */
    public function textarea($name, $value = null, $attributes = [])
    {
        return new Textarea($name, $value, $attributes);
    }
}
