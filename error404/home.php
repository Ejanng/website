<?php
// Start or resume the session
session_start();

// checking the value of email
// var_dump($_SESSION["email"]);
// Check if the user is logged in
if (isset($_SESSION["email"])) {
    // User is logged in, include user-home.php
    include 'user/user-home.php';
} else {
    // User is not logged in, include guest-home.php
    include 'guest/guest-home.php';
}
?>
