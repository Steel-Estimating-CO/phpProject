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
$FirstNameArray = array();
$LastnameArray = array();
$EmailArray = array();
$UsernameArray = array();
$UsertypeArray = array();
while ($stmt->fetch()) 
{
    $FirstNameArray[]= $FirstName;
    $LastnameArray[] = $Lastname;
    $EmailArray[]= $Email;
    $UsernameArray[] = $Username;
    $UsertypeArray[]= $Usertype;
}
$stmt->close();
header("Location: AdminHomepage.php?UserID=$newId");
?>