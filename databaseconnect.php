<?php
require_once 'pdoconfig.php';
 
try {
    $conn = new PDO("mysql:host=$localhost;dbname=$testbd1", $username, $password);
    echo "Connected to $testbd1 at $localhost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $testbd1 :" . $pe->getMessage());
}
?>
