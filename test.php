<?php
require 'db-config.php';

try {
    $conn = new PDO($db_dsn, $db_user, $db_pass);
    // set the PDO error mode to exception
    echo "Connected successfully";
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}






?>