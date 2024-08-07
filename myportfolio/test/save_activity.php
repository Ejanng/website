<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "activity_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$message = $_POST['message'];
$date = $_POST['date'];
$time = $_POST['time'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO activities (title, message, date, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $message, $date, $time);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.html"); // Redirect to the main page
exit();
?>
