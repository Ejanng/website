<?php
require_once "config-variables.php";

// $sql = "SELECT * FROM users WHERE username = :username";
// $stmt = $db->prepare($sql);
// $stmt->bindParam(':username', $username);
// $stmt->execute();

// $result = $stmt->fetch(PDO::FETCH_ASSOC);

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

        // Query the database to retrieve the hashed password for the given email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Verify the entered password against the hashed password stored in the database
            if (password_verify($password, $result['password'])) {
                // Login successful
                $_SESSION["email"] = $email;
                $_SESSION["username"] = $result['username']; // Save the username in the session
                echo '<script>window.location.href = "home.php";</script>';
                exit(); // Ensure no further output is sent
            } else {
                // Invalid password
                echo "<p style='color: red;'>Invalid email or password.</p>";
            }
        } else {
            // User not found
            echo "<p style='color: red;'>Invalid email or password.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Welcome</title>
    <style>
        .signup-portal {
            padding: 0.5rem 1.5rem;
            text-align: center;
            color: white;
        }

        .signup-portal:hover {
            transition: background-color 0.3s;
            text-decoration: underline;
        }

        .log-in-design {
            border: 1px solid rgb(148, 163, 250);
            border-radius: 2px;
            padding: 3em;
            padding-top: 10em;
            padding-bottom: 2em;
        }
        
        @media only screen and (max-width: 480px) {
            .log-in-design {
            padding: 2em;
            padding-top: 3em;
            padding-bottom: 2em;
        }
    }

    </style>
</head>
<body class="main-body">
<div class="index-body">
    <form class="log-in-design" method="post" action="">
        <h3>Login</h3>
        <div>
            <label for="useremail-log-in">Email: </label>
            <input type="text" name="email" id="useremail-log-in" required>
        </div>
        <div>
            <label for="userpass-log-in">Password: </label>
            <input type="password" name="password" id="userpass-log-in" required>
        </div>
        <div>
            <input type="submit" value="Enter">
        </div>
        <br>
        <a href="<?php echo $basePath; ?>signup.php" class="signup-portal">Don't have an account? Sign up.</a>
    </form>
</div>

<!-- <?php
include("footer.html");
?> -->
