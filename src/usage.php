<?php

/**
 * CSRF Protection Sample Code
 */

    // Instantiate
    $csrfProtection = new CSRFProtection();

    // Gen token and assign to variable
    $token = $csrfProtection->generateToken();
?>

<!-- Other HTML will go here -->

<form action="submit.php" method="post">
    <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo htmlspecialchars($token) ?>">
    <!-- Your other form fields go here -->
    <button type="submit">Submit</button>
</form>
