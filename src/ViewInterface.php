<?php

namespace Blade;

interface ViewInterface
{
    /**
     * Get the evaluated contents of the object
     * @return string
     */
    public function render();

    /**
     * Get the name of the view.
     *
     * @return string
     */
    public function name();

    /**
     * Add a piece of data to the view.
     *
     * @param  string|array  $key
     * @param  mixed   $value
     * @return $this
     */
    public function with($key, $value = null);
}