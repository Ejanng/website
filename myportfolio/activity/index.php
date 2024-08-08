<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/activity.css">
    <title>Activity Tracker</title>
</head>
<body>
    <header>
        <h1>History</h1>
        <nav>
            <li><a href="../main/index.php">Back?</a></li>
        </nav>
    </header>

    <main>
        <h1>Activity Tracker</h1>
        <form id="activityForm" method="POST" action="../activity/save_activity.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea><br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>

            <button type="submit">Save Activity</button>
        </form>

        <h2>All Activities</h2>
        <div id="calendar">
            <?php
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

            // Fetch all activities
            $sql = "SELECT title, message, date, time FROM activities ORDER BY date DESC, time DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='activity'>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["message"] . "</p>";
                    echo "<p>Date: " . $row["date"] . " Time: " . $row["time"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No activities found.";
            }

            $conn->close();
            ?>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2024 Your Company Name. All rights reserved.</p>
    </footer>
</body>
</html>
