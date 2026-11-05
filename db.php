<?php

$conn = mysqli_connect("localhost", "root", "", "mysql1");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>