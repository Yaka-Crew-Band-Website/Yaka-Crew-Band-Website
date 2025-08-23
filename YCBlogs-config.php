<?php
// config.php

$host = "localhost";
$user = "root";
$password = "";
$database = "yaka_crew_band"; // ✅ Change this to your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
