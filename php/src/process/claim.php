<?php
include ('../includes/conn.inc.php');
$mysqli = new mysqli($hostname, $user, $password, $database);
$stmt = $mysqli->prepare("UPDATE Listings SET Claimed = ? WHERE userID = ?");
$stmt->bind_param('ii', $_POST['Claimed'], $_POST['userID']);
$stmt->execute(); 
$userID = $stmt->insert_id;
$stmt->close();
header("Location: ../MarketPlace.php");
?>