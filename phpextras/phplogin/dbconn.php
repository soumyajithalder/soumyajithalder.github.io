<?php
$conn = new mysqli("localhost", "admin", "admin", "phpextra");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
    }
?>