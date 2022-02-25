<?php
$hostname = "db";
$user = "MYSQL_USER";
$password = "MYSQL_PASSWORD";
$database = 'MYSQL_DATABASE';
$mysqli = new mysqli($hostname, $user, $password, $database);
$mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // This gives more accurate error codes
?>