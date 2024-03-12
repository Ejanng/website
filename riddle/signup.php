<?php
    session_start();
    include("header.html");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body class="signup-body">
    <form action="index.php" method="post">
        <h3>Sign Up</h3>
        Username<br>
        <input type="text" name="username"><br>
        Password<br>
        <input type="password" name="password"><br>
        <input type="submit" name="signup" value="Register">
    </form>
</body>
</html>

<?php
    if(isset($_POST["username"])){
        
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];

            echo"Submitted";
        } else {
            echo"Missing username/password";
        }
    }

    include("footer.html");
?>