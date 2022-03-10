<?php
include ('../includes/conn.inc.php');
$mysqli = new mysqli($hostname, $user, $password, $database);
$stmt = $mysqli->prepare("UPDATE Complaints SET Complete = ? WHERE CaseID = ?");
$stmt->bind_param('ii', $_POST['Complete'], $_POST['CaseID']);
$stmt->execute(); 
$stmt->close();
header("Location: ../AdminNewComplaint.php");
?>