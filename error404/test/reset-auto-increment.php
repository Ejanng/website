<?php
require_once "../config-variables.php";

try {
    // Include your Database class and get a PDO instance
    require_once "../model/database.php";
    $db = Database::getDB();

    // Replace 'users' with the actual name of your table
    $tableName = 'users';

    $query = "ALTER TABLE $tableName AUTO_INCREMENT = 1";
    $stmt = $db->prepare($query);
    $stmt->execute();

    echo "Auto-increment reset successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
