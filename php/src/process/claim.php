<?php
include ('../includes/conn.inc.php');
$mysqli = new mysqli($hostname, $user, $password, $database);
$stmt = $mysqli->prepare("UPDATE Listings SET Claimed = ? WHERE UserID = ?");
$stmt->bind_param('ii', $_POST['Claimed'], $_POST['UserID']);
$stmt->execute(); 
$stmt->close();
header("Location: ../MarketPlace.php");
?>