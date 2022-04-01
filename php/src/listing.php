<?php
include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID ,userID, Type, Description, Claimed FROM Listings WHERE listingID = ?");
    $stmt->bind_param('i', $_GET['listingID']);
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed);
    $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EstimatorLayout.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div class="MenuBar">
    <p class ="MenuHeader"> Estimator </p>
    <div class ="ProfilePic1"> </div>
    <p class = "AdminInfo">Matthew Gaffor </p>
    <div class="MenuOptions1" onclick="location.href='EstimatorHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions" onclick="location.href='EstimatorCurrent.php'"><p class="MenuTxt">Current Job</p></div>
    <div class="MenuOptions" onclick="location.href='MarketPlace.php'"><p class="MenuTxt">Marketplace</p></div>
    <div class="MenuOptions" onclick="location.href='NewComplaint.php'"><p class="MenuTxt">Complaints & Questions</p></div>
    </div>
<table class="spacing-table">
    <tr>
        <th class = "tableheader">Listing ID &emsp;</th>
        <th class = "tableheader">Type &emsp;</th>
        <th class = "tableheader">Description &emsp;</th>
    </tr>
    <?php

            echo "<tr>";
            echo "<td class = mainCell> &emsp; $listingID </td>";
            echo "<td class = mainCell> &emsp; $Type </td>";
            echo "<td class = mainCell> &emsp; $Description </td>";
            echo "</tr>";
            ?>
</body>
</html>