<?php
include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed, estimatorID FROM Listings WHERE Claimed = 0");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed,$estimatorID);
    $stmt->store_result();
    $numRows = $stmt->num_rows;
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
<div class="MenuOptions1" onclick="location.href='EstimatorHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions" onclick="location.href='EstimatorCurrent.php'"><p class="MenuTxt">Current Job</p></div>
    <div class="MenuOptions" onclick="location.href='MarketPlace.php'"><p class="MenuTxt">Marketplace</p></div>
    <div class="MenuOptions" onclick="location.href='NewComplaint.php'"><p class="MenuTxt">Complaints & Questions</p></div>
</div>

<?php
if($numRows > 0){
?>
<table class="Listings">
    <tr>
        <th>Listing ID &emsp;</th>
        <th>User ID &emsp;</th>
        <th>Type &emsp;</th>
        <th>Description &emsp;</th>
    </tr>
    <?php

        while ($stmt->fetch()) 
        {
            echo "<tr>";
            echo "<td> &emsp; $listingID </td>";
            echo "<td> &emsp; $userID </td>";
            echo "<td> &emsp; $Type </td>";
            echo "<td> &emsp; $Description </td>";
            echo "<td><a href=\"listing.php?listingID=$listingID\">View</a></td>";
            echo "<td><form action=\"process/claim.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"Claimed\" value=\"1\">";
            echo "<input type=\"hidden\" name=\"userID\" value=\"$userID\">";
            echo "<input type=\"submit\" value=\"Claim\">";
            echo "</form></td>";
            echo "</tr>";

        }
            ?>

    </table>

<?php
}else{
    echo "<p>Nothing to claim.</p>";
}
?>

<script>
    
</script>
</body>
</html>