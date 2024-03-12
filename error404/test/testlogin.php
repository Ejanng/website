<?php
require_once "config-variables.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate input (You may want to add more validation)
    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Include your Database class
        require_once "model/database.php";

        // Get a PDO instance from the Database class
        $db = Database::getDB();

        // Query the database to check if the provided credentials are valid
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Login successful
            $_SESSION["email"] = $email;
            echo '<script>window.location.href = "home.php";</script>';
            exit(); // Ensure no further output is sent
        } else {
            // Invalid credentials
            echo "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Welcome</title>
</head>
<body class="main-body">
<div class="index-body">

    <form class="log-in-design" method="post" action="">
        <h3>Login</h3>
        <div>
            <label for="useremail-log-in">Email: </label>
            <input type="text" name="email" id="useremail-log-in">
        </div>
        <div>
            <label for="userpass-log-in">Password: </label>
            <input type="password" name="password" id="userpass-log-in">
        </div>
        <div>
            <input type="submit" value="Enter">
        </div>
        <a href="<?php echo $basePath; ?>testsignup.php">Don't have an account? Sign up.</a>
    </form>
</div>
</body>
</html>

<?php
include("footer.html");
?>
