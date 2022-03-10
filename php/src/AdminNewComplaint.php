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

<div class="MenuBar"></div>
<p class="NewUserHeader">New Complaint:</p>

<form action="" method="get" id="filterForm">
<select name="Filter" id="Filter">
        <option value="All">All Complaints</option>
        <option value="JobPosting">Job Posting</option>
        <option value="Payments">Payments</option>
        <option value="Other">Other</option>
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