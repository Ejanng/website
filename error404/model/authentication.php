<?php
    require_once 'database.php';
    
    if (!function_exists('login')) {
        function login($username, $email, $password) {
            $db = Database::getDB();

            $findUser = "SELECT username FROM users WHERE username=:username";
            $statement = $db->prepare($findUser);
            $statement->bindValue(":username", $username, PDO::PARAM_STR);

            $statement->execute();

            $foundRowArray = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            if ($foundRowArray) {
                return false;
            }

            return true;
        }
    }

    if (!function_exists('signup')) {
        function signup($username, $email, $password) {
            $db = Database::getDB();

            $findUser = "SELECT username FROM users WHERE username=:username";
            $statement = $db->prepare($findUser);
            $statement->bindValue(":username", $username, PDO::PARAM_STR);

            $statement->execute();

            $foundRowArray = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            if ($foundRowArray) {
                return false;
            }

            $createUser = "INSERT INTO users(username, email, password, created_at) VALUES(:username, :email, :password, :created_at)";
            $statement = $db->prepare($createUser);
            $statement->bindValue(":username", $username, PDO::PARAM_STR);
            $statement->bindValue(":email", $email, PDO::PARAM_STR);
            $statement->bindValue(":password", $password, PDO::PARAM_STR);
            $statement->bindValue(":created_at", date('Y-m-d H:i:s'), PDO::PARAM_STR); // Add this line for the current timestamp

            $statement->execute();
            $statement->closeCursor();

            return true;
        }

    }
?>
