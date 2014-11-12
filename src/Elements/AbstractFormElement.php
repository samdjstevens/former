<?php

namespace Spanky\Former\Elements;

/**
 * Class AbstractFormElement
 *
 * @package Spanky\Former
 */
abstract class AbstractFormElement
{
    /**
     * The attributes of the element.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The value of the element.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string|null $value
     * @param array $attributes
     */
    public function __construct($name, $value = null, $attributes = [])
    {
        $this->attr('name', $name);
        // Set the name attribute

        if (! is_null($value)) {
            // If a (non-null) value was passed, set
            // the value attribute
            $this->value = $value;
            $this->attr('value', $value);
        }

        foreach($attributes as $name => $value) {
            $this->attr($name, $value);
        }
        // Set each attribute in the passed in array
    }

    /**
     * Set an attribute on the element.
     *
     * @param  string $name
     * @param  mixed $value
     * @return $this
     */
    public function attr($name, $value)
    {
        $methodName = 'set' . str_replace(array(' ', '_', '-'), '', ucwords($name)) . 'Attribute';
        // Form a method name of form "set{AttributeName}Name"

        if (method_exists($this, $methodName)) {
            // A specific attribute set method has been defined
            // for this attribute, call that with the
            // value

            return $this->{$methodName}($value);
        }

        $this->attributes[$name] = $value;
        // Otherwise, just set the attribute

        return $this;
    }

    /**
     * Copy the name across to the id attribute
     * when set by default.
     *
     * @param string $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['id'] = $name;
    }

    /**
     * Returns the compiled HTML for the element.
     *
     * @return string
     */
    public abstract function build();

    /**
     * Return the compiled HTML when casted to
     * a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->build();
    }

    /**
     * Get all the attributes.
     *
     * @return array
     */
    protected function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Serialize the attributes into a string of
     * format attr1="value2" attr2="value2".
     *
     * @return string
     */
    protected function serializeAttributes()
    {
        $keyValuePairs = [];
        // Initialise an array to hold the
        // key/value pairs

        foreach($this->getAttributes() as $name => $value) {
            array_push($keyValuePairs, sprintf('%s="%s"', $name, $value));
        }
        // Loop through each attribute, adding the name=value string
        // to the key/value pairs array

        return count($keyValuePairs) ? ' ' . implode(' ', $keyValuePairs) : '';
        // Join the pairs together in a space separated string, with
        // a leading space
    }
}
