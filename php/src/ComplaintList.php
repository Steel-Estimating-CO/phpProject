<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT CaseID, UserID, UserDate, UserEmail, Category, UserSubject, Complete FROM Complaints WHERE CaseID = ?");
$stmt->bind_param('i', $_GET['CaseID']);
$stmt->execute();
$stmt->bind_result($CaseID, $UserID, $UserDate, $UserEmail, $Category, $UserSubject, $Complete);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminLayout.css" type="text/css">
    <title>Document</title>
</head>
<body>

<div class="MenuBar"></div>
<p class="NewUserHeader">New Complaint:</p>
<table class="NewUserTable">
    <tr>
        <th>UserID &emsp;</th>
        <th>Date &emsp;</th>
        <th>User Email &emsp;</th>
        <th>Category &emsp;</th>
        <th>Subject &emsp;</th>
    </tr>
    <?php
        echo "<td> &emsp; $UserID </td>";
        echo "<td> &emsp; $UserDate </td>";
        echo "<td> &emsp; $UserEmail </td>";
        echo "<td>  $Category </td>";
        echo "<td> &emsp; $UserSubject </td>";
    ?>
</table>

</body>
</html>