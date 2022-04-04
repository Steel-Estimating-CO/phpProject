<?php
    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Title, Description, Claimed, estimatorID FROM Listings");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Title, $Description, $Claimed, $estimatorID);
    $stmt->store_result();
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

<div class="MenuBar">
<div class="ProfilePic1"></div>
    <p class="namer">Steve Alright</p>
    <p class="roler">(Admin)</p>
    <div class="MenuOptions1" onclick="location.href='AdminHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions" onclick="location.href='AdminAccountSettings.php'"><p class="MenuTxt">Account Settings</p></div>
    <div class="MenuOptions" onclick="location.href='AdminNewUsers.php'"><p class="MenuTxt">User Approvals</p></div>
    <div class="MenuOptions" onclick="location.href='AdminUserList.php'"><p class="MenuTxt">User List</p></div>
    <div class="MenuOptions" onclick="location.href='AdminNewComplaint.php'"><p class="MenuTxt">User Complaints</p></div>
    <div class="MenuOptions"><p class="MenuTxt">Payments</p></div>
    <div class="MenuOptions" onclick="location.href='AdminNewListings.php'"><p class="MenuTxt">Active Listings</p></div>
    </div>
<p class="NewUserHeader">Active Listings:</p>
<table class="NewUserTable">
    <tr>
        <th>Listing ID &emsp;</th>
        <th>User ID &emsp;</th>
        <th>Listing Type &emsp;</th>
        <th>Job Title &emsp;</th>
        <th>Description &emsp;</th>
        <th>Remove Listing &emsp;</th>
    </tr>
    <?php
    include ('includes/conn.inc.php');

    $sqli = "SELECT * FROM Listings WHERE Claimed=0 AND Claimed=1 LIMIT 5";
    $result = mysqli_query($mysqli, $sqli);
    $count = mysqli_num_rows($result);

    if ($count > 0)
    {
        while ($stmt->fetch())
        {
            if ($Claimed == 0)
            {
                    echo "<tr>";
                    echo "<td> &emsp; $listingID </td>";
                    echo "<td> &emsp; $userID </td>";
                    echo "<td> &emsp; $Type </td>";
                    echo "<td> &emsp; $Title </td>";
                    echo "<td>  $Description </td>";
                    echo "<td>";
                    echo "<Form action=\"process/rejectlisting.php\" method=\"post\" id=\"removeListing\">";
                    if($Claimed == 0){
                        $newClaimedVal = 4;
                    }
                    echo "<div class=\"CompOption6\" ><p class=\"CompText6\" id=\"removeBtn\">Remove Listing</p></div>";
                    echo "<input type=\"hidden\" name=\"listingID\" value=\"$listingID\">";
                    echo "<input type=\"hidden\" name=\"Claimed\" value=\"$newClaimedVal\">";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
            }
            else if ($Claimed == 1)
            {
                    echo "<tr>";
                    echo "<td> &emsp; $listingID </td>";
                    echo "<td> &emsp; $userID </td>";
                    echo "<td> &emsp; $Type </td>";
                    echo "<td> &emsp; $Title </td>";
                    echo "<td>  $Description </td>";
                    echo "<td>";
                    echo "<Form action=\"process/rejectlisting.php\" method=\"post\" id=\"removeListing\">";
                    if($Claimed == 1){
                        $newClaimedVal = 4;
                    }
                    echo "<div class=\"CompOption6\" ><p class=\"CompText6\" id=\"removeBtn\">Remove Listing</p></div>";
                    echo "<input type=\"hidden\" name=\"listingID\" value=\"$listingID\">";
                    echo "<input type=\"hidden\" name=\"Claimed\" value=\"$newClaimedVal\">";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
            }
        }
    }
    else
    {
        echo "<tr>";
            echo "<td colspan=\"6\">No Records Found!</td>";
        echo "</tr>";
    }
    ?>
</table>

<script>
(function(){
var resolveBtn = document.getElementById("removeBtn");
var resolveForm = document.getElementById("removeListing");
resolveBtn.addEventListener("click", function(ev){
    resolveForm.submit();
})

})()
</script>
</body>
</html>