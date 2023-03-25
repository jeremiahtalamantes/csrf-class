<?php

/**
 * CSRF Protection Sample Code
 */

class CSRFProtection {

    /**
     * Properties
     */
    private $sessionKey;

    /**
     * Constructor
     */
    public function __construct($sessionKey = 'csrf_token')
    {
        $this->sessionKey = $sessionKey;
    }

    /**
     * Methods
     */

    public function generateToken()
    {
        // Check for session; start if not already started
        if (!session_id())
        {
            session_start();
        }

        // Generate token using random_bytes
        $token = bin2hex(random_bytes(32));

        // Save token to session
        $_SESSION[$this->sessionKey] = $token;

        return $token;
    }

    public function validateToken($receivedToken)
    {
        // Start session
        if (!session_id()) 
        {
            session_start();
        }

        // Check for missing sessionKey in memory or if one was not passed
        // to this function
        if (!isset($_SESSION[$this->sessionKey]) || !isset($receivedToken))
        {
            return false;
        }

        // Perform token validation
        $isTokenValid = hash_equals($_SESSION[$this->sessionKey], $receivedToken);

        // Remove the sessionKey from memory
        unset($_SESSION[$this->sessionKey]);

        return $isTokenValid;
    }
}
