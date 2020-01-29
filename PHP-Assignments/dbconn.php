<?php
$conn = new mysqli("localhost", "admin", "admin", "Login");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
    }
?>