<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("INSERT INTO Complaints(UserID, UserDate, UserEmail, Category, UserSubject) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('issss',
$_POST['UserID'],
$_POST['UserDate'],
$_POST['UserEmail'],
$_POST['Category'],
$_POST['UserSubject']);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();
header("Location: CustomerHomepage.php");
?>