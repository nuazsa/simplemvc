<?php

namespace Nuazsa\Simplemvc\App;

/**
 * Class View
 *
 * This class is responsible for rendering views in the application.
 * It includes a method to render a specified view with optional data.
 */
class View
{
    /**
     * Renders the specified view.
     *
     * This method includes the specified view file and makes the data in the $model
     * array available to the view. The view file is expected to be located in the
     * '../View/' directory relative to this class.
     *
     * @param string $view The name of the view file to render, without the '.php' extension.
     * @param array $model An associative array of data to be made available to the view. Default is an empty array.
     */
    public static function render(string $view, array $model = []) 
    {
        require __DIR__ . '/../View/' . $view . '.php';
    }
}