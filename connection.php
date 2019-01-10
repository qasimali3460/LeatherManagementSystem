<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="gnind";
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Failed to Connect: " . mysqli_connect_error());
}
?>