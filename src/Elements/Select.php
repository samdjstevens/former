<?php

namespace Spanky\Former\Elements;

use Spanky\Former\FormElement;

/**
 * Class Select
 *
 * @package Spanky\Former
 */
class Select extends AbstractFormElement implements FormElement
{
    /**
     * The value/labels to be used for the
     * select option tags.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The value to set as selected.
     *
     * @var string
     */
    protected $selectedValue;

    /**
     * Constructor.
     *
     * @param string $name
     * @param array $options
     * @param null $value
     * @param array $attributes
     */
    public function __construct($name, $options = [], $value = null, $attributes = [])
    {
        parent::__construct($name, null, $attributes);

        $this->options = $options;
        $this->selectedValue = $value;
    }

    /**
     * Add a "placeholder" option to the select. This
     * is an option that is first, with an empty
     * value by default.
     *
     * @param  string $label
     * @param  string $value
     * @return $this
     */
    public function placeholder($label, $value = '')
    {
        $options = $this->options;
        // Store the current options

        $this->options = [$value => $label];
        // Restart the options array, with the placeholder
        // as the first element

        foreach($options as $value => $label) {
            $this->options[$value] = $label;
        }
        // Add back the existing options

        return $this;
    }

    /**
     * Returns the compiled HTML for the element.
     *
     * @return string
     */
    public function build()
    {
        return sprintf(
            '<select%s>%s</select>',
            $this->serializeAttributes(),
            $this->buildOptionTags()
        );
    }

    /**
     * Build the option tags to be placed inside
     * the select tag.
     *
     * @return string
     */
    protected function buildOptionTags()
    {
        $html = '';
        // Initalise the empty HTML string

        foreach($this->options as $value => $label) {
            // Loop through and build each <option>
            // tag
            $html .= sprintf(
                '<option value="%s"%s>%s</option>',
                $value,
                $this->getSelectedAttribute($value),
                $label
            );
        }

        return $html;
    }

    /**
     * Returns the " selected" string if the passed
     * in value is the one set to be selected, or an
     * empty string otherwise.
     *
     * @param  string $value
     * @return string
     */
    protected function getSelectedAttribute($value)
    {
        return $this->selectedValue == $value ? ' selected' : '';
    }
}
