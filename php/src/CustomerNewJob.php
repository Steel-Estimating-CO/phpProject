<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("INSERT INTO Listings(userID, Type, Description ) VALUES (?, ?, ?)");
$stmt->bind_param('iss',
$_POST['userID'],
$_POST['Type'],
$_POST['Description']);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();
header("Location: CustomerHomepage.php");
?>