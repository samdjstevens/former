<?php

namespace Spanky\Former;

/**
 * Interface FormElement
 *
 * @package Spanky\Former
 */
interface FormElement
{
    /**
     * Specify the return value for the FormElement
     * when casted to a string.
     *
     * @return string
     */
    public function __toString();
}
