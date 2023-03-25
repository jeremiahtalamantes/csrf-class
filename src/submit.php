<?php

/**
 * CSRF Protection Sample Code
 */

    // Include the class
    require_once 'CSRFProtection.php';

    // Instantiate object
    $csrfProtection = new CSRFProtection();

    /**
     * When the user submits (POST), validate the token
     */
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        // Ensure a token has been submitted in the POST request
        $receivedToken = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : null;

        // Validate token
        if ($csrfProtection->validateToken($receivedToken))
        {
            /**
             * Process data included in this request
             */
        } else {
            /**
             * Invalid token! Stop processing and error out
             */
            echo "Invalid CSRF token.";
            exit;
        }
    }
