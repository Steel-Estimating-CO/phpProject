<?php
include ('../includes/conn.inc.php');
$mysqli = new mysqli($hostname, $user, $password, $database);
$stmt = $mysqli->prepare("UPDATE Listings SET Claimed = ? WHERE listingID = ?");
$stmt->bind_param('ii', $_POST['Claimed'], $_POST['listingID']);
$stmt->execute();
$stmt->close();
header("Location: ../AdminNewListings.php");
?>