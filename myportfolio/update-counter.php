<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the file path
$filePath = 'counter.txt';

// Check if the file exists
if (!file_exists($filePath)) {
    // Attempt to create the file and initialize with count 0
    if (file_put_contents($filePath, '0') === false) {
        echo 'Failed to create the file.';
        exit;
    }
}

// Check if the count is set and handle updating
if (isset($_POST['count'])) {
    $count = $_POST['count'];

    // Sanitize input
    $count = intval($count);

    // Attempt to save the new count to the text file
    if (file_put_contents($filePath, $count) === false) {
        echo 'Failed to write to the file.';
        exit;
    }

    // Success message
    echo 'Count updated successfully.';
} else {
    echo 'No count provided.';
}
