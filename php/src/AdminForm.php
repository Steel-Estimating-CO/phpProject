<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("INSERT INTO Users(Firstname, Lastname, Email, Username, Usertype) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss',
$_POST['Firstname'],
$_POST['Lastname'],
$_POST['Email'],
$_POST['Username'],
$_POST['Usertype']);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();
header("Location: index.php");
?>