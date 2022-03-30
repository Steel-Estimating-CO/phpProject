<?php
include ('includes/conn.inc.php');
if(!isset($_GET["Filter"])){
    $filter = "All";
}else{
    $filter = $_GET["Filter"];
}
if($filter == "All"){
    $stmt = $mysqli->prepare("SELECT CaseID, UserID, UserDate, UserEmail, Category, UserSubject, Complete FROM Complaints");
}else{
    $stmt = $mysqli->prepare("SELECT CaseID, UserID, UserDate, UserEmail, Category, UserSubject, Complete FROM Complaints WHERE Category = ?");
    $stmt->bind_param('s', $filter);
}
$stmt->execute(); 
$stmt->bind_result($CaseID, $UserID, $UserDate, $UserEmail, $Category, $UserSubject, $Complete);
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
    <div class="MenuOptions"><p class="MenuTxt">New Listings</p></div>
    </div>
<p class="NewUserHeader">New Complaint:</p>

<form action="" method="get" id="filterForm">
<select name="Filter" id="Filter" class="filter">
        <option value="All" <?php echo ($filter == "All") ? 'selected' : ''; ?>>All Complaints</option>
        <option value="JobPosting" <?php echo ($filter == "JobPosting") ? 'selected' : ''; ?>>Job Posting</option>
        <option value="Payments" <?php echo ($filter == "Payments") ? 'selected' : ''; ?>>Payments</option>
        <option value="Other" <?php echo ($filter == "Other") ? 'selected' : ''; ?>>Other</option>
</select>
</form>
<table class="NewUserTable">
    <tr>
        <th>UserID &emsp;</th>
        <th>Date &emsp;</th>
        <th>User Email &emsp;</th>
        <th>Category &emsp;</th>
        <th>Subject &emsp;</th>
    </tr>
    <?php

        while ($stmt->fetch()) 
        {
            if ($Complete == 0)
            {
                echo "<tr>";
                echo "<td> &emsp; $UserID </td>";
                echo "<td> &emsp; $UserDate </td>";
                echo "<td> &emsp; $UserEmail </td>";
                echo "<td>  $Category </td>";
                echo "<td> <a href=\"ComplaintList.php?CaseID=$CaseID\">Expand</a></td>";
                echo "</tr>"; 
            }
            if ($Complete == 2)
            {
                echo "<tr>";
                echo "<td style=\"background-color: red\"> &emsp; $UserID </td>";
                echo "<td style=\"background-color: red\"> &emsp; $UserDate </td>";
                echo "<td style=\"background-color: red\"> &emsp; $UserEmail </td>";
                echo "<td style=\"background-color: red\">  $Category </td>";
                echo "<td style=\"background-color: red\"> <a href=\"ComplaintList.php?CaseID=$CaseID\">Expand</a></td>";
                echo "</tr>"; 
            }
        }
    ?>
</table>

</body>
<script>
document.getElementById("Filter").addEventListener("change", function(){
    document.getElementById("filterForm").submit();
})

</script>
</html>