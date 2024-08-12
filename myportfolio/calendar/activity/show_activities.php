<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "activity_tracker";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch activities for the given date
    $sql = "SELECT title, message, date, time FROM activities WHERE date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();

    $activities = [];

    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }

    echo json_encode($activities);

    $stmt->close();
    $conn->close();
}
?>
