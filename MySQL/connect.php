<?php
$conn = new mysqli("localhost", "root", "", "test");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
    }
?>