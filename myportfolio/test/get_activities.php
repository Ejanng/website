<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "activity_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = $_GET['date'];

$sql = "SELECT title, message, time FROM activities WHERE date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $date);
$stmt->execute();

$result = $stmt->get_result();
$activities = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($activities);
?>
