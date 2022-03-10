<?php
include ('../includes/conn.inc.php');
$mysqli = new mysqli($hostname, $user, $password, $database);
$stmt = $mysqli->prepare("UPDATE Users SET Auth = ? WHERE UserID = ?");
$stmt->bind_param('ii', $_POST['Auth'], $_POST['UserID']);
$stmt->execute(); 
$stmt->close();
header("Location: ../AdminNewUsers.php");
?>