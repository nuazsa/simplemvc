<?php

namespace Nuazsa\Simplemvc\App;

class View
{
    public static function render(string $view, array $model) 
    {
        require __DIR__ . '/../View/' . $view . '.php';
    }
}