<?php
$conn = new mysqli("localhost", "root", "", "aid_finder");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
