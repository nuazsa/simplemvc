<?php

namespace Nuazsa\Simplemvc\Middleware;

/**
 * Interface Middleware
 *
 * This interface defines a middleware contract that requires implementing classes to define a 'before' method.
 * Middleware classes implementing this interface can perform actions before a request is handled by the controller.
 */
interface Middleware
{
    /**
     * Method to be executed before the main request.
     *
     * This method should contain the logic to be executed before the main request processing.
     * Examples of use cases include authentication checks, logging, or modifying request data.
     *
     * @return void
     */
    function before(): void;
}
