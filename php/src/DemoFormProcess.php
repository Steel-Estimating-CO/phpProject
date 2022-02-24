<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("INSERT INTO Users(Firstname, Lastname, Email) VALUES (?, ?, ?)");
$stmt->bind_param('sss', 
$_POST['Firstname'], 
$_POST['Lastname'], 
$_POST['Email']);
$stmt->execute(); 
$newId = $stmt->insert_id;
$stmt->close();
header("Location: Demo1.php?UserID=$newId");
?>