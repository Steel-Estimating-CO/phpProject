<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("INSERT INTO Listings(userID, Type, Title, Description) VALUES (?, ?, ?, ?)");
$stmt->bind_param('isss',
$_POST['userID'],
$_POST['Type'],
$_POST['Title'],
$_POST['Description']);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();
header("Location: CustomerHomepage.php");
?>