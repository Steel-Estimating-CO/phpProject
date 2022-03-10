<?php
    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed FROM Listings");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed);
    $stmt->store_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MarketPlaceLayout.css" type="text/css">
    <title>Document</title>
</head>
<body>
<ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="MarketPlace.php">MarketPlace</a></li>
      </ul>
<div class="MenuBar"></div>
<table class="Listings">
    <tr>
        <th>Listing ID &emsp;</th>
        <th>User ID &emsp;</th>
        <th>Type &emsp;</th>
        <th>Description &emsp;</th>
        </form>
    </tr>
    <?php

        while ($stmt->fetch()) 
        {
            if($Claimed == 0)
            {
            echo "<tr>";
            echo "<td> &emsp; $listingID </td>";
            echo "<td> &emsp; $userID </td>";
            echo "<td> &emsp; $Type </td>";
            echo "<td> &emsp; $Description </td>";
            echo "<td><a href=\"listing.php?listingID=$listingID\">View</a></td>";
            echo "<td>Claim";
            echo "</tr>";
            } 
        }
            ?>
</body>
</html>