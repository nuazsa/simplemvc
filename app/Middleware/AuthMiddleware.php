<?php

namespace Nuazsa\Simplemvc\Middleware;

/**
 * Class AuthMiddleware
 *
 * This middleware checks if the user is authenticated by verifying the presence of a 'username' in the session.
 * If the user is not authenticated, they are redirected to the login page.
 */
class AuthMiddleware implements Middleware
{
    /**
     * Checks if the user is authenticated before allowing access to the requested resource.
     *
     * This method starts a session and verifies if the 'username' is set in the session.
     * If the 'username' is not set, the user is redirected to the login page.
     *
     * @return void
     */
    public function before(): void
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header('Location: /login');
            exit;
        }
    }
}
