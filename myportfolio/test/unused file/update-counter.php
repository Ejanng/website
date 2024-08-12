<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "counter_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS counter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    count INT NOT NULL
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Determine the action to perform
$action = isset($_POST['action']) ? $_POST['action'] : 'fetch';

switch ($action) {
    case 'fetch':
        // Fetch the current count
        $sql = "SELECT count FROM counter ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['count'];
        } else {
            echo '0';
        }
        break;

    case 'increment':
        // Increment the count
        $sql = "SELECT count FROM counter ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_count = $row['count'];
            $new_count = $current_count + 1;

            $sql = "UPDATE counter SET count = ? ORDER BY id DESC LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $new_count);
        } else {
            $new_count = 1;
            $sql = "INSERT INTO counter (count) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $new_count);
        }

        if ($stmt->execute()) {
            echo 'Count incremented successfully to ' . $new_count;
        } else {
            echo 'Failed to increment the count.';
        }

        $stmt->close();
        break;

    case 'save':
        // Save the current count
        $count = isset($_POST['count']) ? intval($_POST['count']) : 0;

        $sql = "SELECT count FROM counter ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sql = "UPDATE counter SET count = ? ORDER BY id DESC LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $count);
        } else {
            $sql = "INSERT INTO counter (count) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $count);
        }

        if ($stmt->execute()) {
            echo 'Count saved successfully to ' . $count;
        } else {
            echo 'Failed to save the count.';
        }

        $stmt->close();
        break;

    case 'reset':
        // Reset the count to zero
        $sql = "DELETE FROM counter";
        if ($conn->query($sql) === TRUE) {
            $sql = "INSERT INTO counter (count) VALUES (0)";
            if ($conn->query($sql) === TRUE) {
                echo 'Count reset successfully to 0';
            } else {
                echo 'Failed to reset the count.';
            }
        } else {
            echo 'Failed to reset the count.';
        }
        break;

    default:
        echo 'Invalid action.';
        break;
}

$conn->close();
?>
