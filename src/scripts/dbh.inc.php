<?php

$dbServername = "ip-172-31-23-139";
$dbUsername = "admin";
$dbPassword = "password";
$dbName = "TAAC";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
