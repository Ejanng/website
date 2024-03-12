// Add a new function in database.php to handle password reset tokens
function insertPasswordResetToken($user_id, $token, $expiry_time, $db) {
    $sql = "INSERT INTO password_reset_tokens (user_id, token, expiry_time) VALUES (:user_id, :token, :expiry_time)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':expiry_time', $expiry_time);
    $stmt->execute();
}

// Add a new function in database.php to retrieve password reset token
function getPasswordResetToken($token, $db) {
    $sql = "SELECT * FROM password_reset_tokens WHERE token = :token";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Add a new function in your existing code to handle password reset requests
function requestPasswordReset($email, $db) {
    // Check if the email exists in the database
    if (isEmailExists($email, $db)) {
        // Generate a unique token and set the expiry time
        $token = bin2hex(random_bytes(32)); // Use a secure method to generate tokens
        $expiry_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // Adjust the expiry time as needed

        // Get the user ID based on the email
        $user_id = getUserIdByEmail($email, $db);

        // Insert the token into the database
        insertPasswordResetToken($user_id, $token, $expiry_time, $db);

        // Send a password reset link to the user's email
        $reset_link = "http://yourdomain.com/password-reset.php?token=$token";
        // Implement your email sending logic here

        echo "<p style='color: green;'>Password reset link sent to your email. Check your inbox.</p>";
    } else {
        echo "<p style='color: red;'>Email not found. Please enter a valid email address.</p>";
    }
}

// Modify your existing code to check for a valid reset token
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Existing code...
} elseif (isset($_GET['token'])) {
    // Handle password reset page logic
    $reset_token = $_GET['token'];
    $token_info = getPasswordResetToken($reset_token, $db);

    if ($token_info && strtotime($token_info['expiry_time']) > time()) {
        // Token is valid, show the password reset form
        // Implement password reset form logic here
    } else {
        echo "<p style='color: red;'>Invalid or expired reset token.</p>";
    }
} else {
    // Display your existing registration form
    // Add a link to the password reset form
    echo "<a href='password-reset-request.php'>Forgot your password? Reset it here.</a>";
}
