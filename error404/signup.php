<?php
session_start();
require_once "config-variables.php";
require_once "model/database.php";

function isUsernameExists($username, $db) {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
}

function isEmailExists($email, $db) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
}

function insertUserData($username, $email, $password, $db) {
    $sql = "INSERT INTO users (username, email, password, created_at) VALUES (:username, :email, :password, :created_at)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hashedPassword);

    $created_at = date('Y-m-d H:i:s');
    $stmt->bindParam(':created_at', $created_at);

    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo "<p style='color: red;'>Please fill in all the required fields.</p>";
    } else {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (strlen($password) < 8) {
            echo "<p style='color: red;'>Password must be at least 8 characters long.</p>";
        } else {
            $db = Database::getDB();

            if (isUsernameExists($username, $db)) {
                echo "<p style='color: red;'>Username already exists. Please choose a different username.</p>";
            } elseif (isEmailExists($email, $db)) {
                echo "<p style='color: red;'>Email already exists. Please choose a different email.</p>";
            } elseif (!endsWith($email, "@gmail.com")) {
                echo "<p style='color: red;'>Email must end with @gmail.com.</p>";
            } else {
                insertUserData($username, $email, $password, $db);
                echo "<script>window.location.href = 'signup-success.php';</script>";
                exit();
            }
        }
    }
}

function endsWith($haystack, $needle) {
    return substr($haystack, -strlen($needle)) === $needle;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Register your account</title>
    <style>
        .login-portal {
            padding: 0.5rem 1.5rem;
            text-align: center;
            color: white;
            }

        .login-portal:hover {
            transition: background-color 0.3s;
            text-decoration: underline;
        }


        .sign-up-design {
            border: 1px solid rgb(148, 163, 250);
            border-radius: 2px;
            padding: 3em;
            padding-top: 10em;
            padding-bottom: 2em;
        }

        @media only screen and (max-width: 480px) {
            .sign-up-design {
            padding: 2em;
            padding-top: 3em;
            padding-bottom: 2em;
        }
    }
    </style>
</head>
<body class="main-body">
    <div class="index-body">
        <form class="sign-up-design" method="post" action="">
            <h3>Signup</h3>
            <div>
                <label for="username-sign-up">User: </label>
                <input type="text" name="username" id="username-sign-up">        
            </div>
            <div>
                <label for="useremail-sign-up">Email: </label>
                <input type="text" name="email" id="useremail-sign-up">        
            </div>
            <div>
                <label for="userpass-sign-up">Password: </label>
                <input type="password" name="password" id="userpass-sign-up">
            </div>
            <div>
                <input type="submit" value="Enter">
            </div>
            <br>
            <a href="<?php echo $basePath; ?>index.php" class="login-portal">Have an account? Login.</a>
        </form>
    </div>
</body>
</html>