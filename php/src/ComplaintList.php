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
<p class="NewUserHeader">User Complaint:</p>
<div class="CTemplate">
<?php

    echo "<p class=\"CInfo\">UserID</p>";
    echo "<p class=\"ClientInfo\">$UserID</p>";
    echo "<p class=\"CInfo\">Email Address</p>";
    echo "<p class=\"ClientInfo\">$UserEmail</p>";
    echo "<p class=\"CInfo\">Category</p>";
    echo "<p class=\"ClientInfo\">$Category</p>";
    echo "<p class=\"ClientSubject\">Subject:</p>";
    echo "<div class=\"DescBox\">";
    echo "<p class=\"ClientSub\">$UserSubject</p>";
    echo "</div>";
?>

<?php
    echo "<Form action=\"process/ResolvedUnresolved.php\" method=\"post\" id=\"resolveForm\">";
    if($Complete == 0){
        $newCompleteVal = 1;
    }
    if($Complete == 2){
        $newCompleteVal = 1;
    }
    echo "<div class=\"CompOption\" ><p class=\"CompText\" id=\"resolveBtn\">Resolved</p></div>";
    echo "<input type=\"hidden\" name=\"CaseID\" value=\"$CaseID\">";
    echo "<input type=\"hidden\" name=\"Complete\" value=\"$newCompleteVal\">";
    echo "</form>";
?>


<div class="CompOption2"><p class="CompText">Send Email</p></div>

<?php
    echo "<Form action=\"process/ResolvedUnresolved.php\" method=\"post\" id=\"unresolveForm\">";
    if($Complete == 0){
        $newCompleteVal = 2;
    }
    if($Complete == 2){
        $newCompleteVal = 2;
    }
    echo "<div class=\"CompOption3\"><p class=\"CompText\" id=\"UnresolvedBtn\">UnResolved</p></div>";
    echo "<input type=\"hidden\" name=\"CaseID\" value=\"$CaseID\">";
    echo "<input type=\"hidden\" name=\"Complete\" value=\"$newCompleteVal\">";
    echo "</form>";
?>

</div>

<script>
(function(){
var resolveBtn = document.getElementById("resolveBtn");
var resolveForm = document.getElementById("resolveForm");
resolveBtn.addEventListener("click", function(ev){
    resolveForm.submit();
})

})()
</script>

<script>
    (function(){
var UnresolvedBtn = document.getElementById("UnresolvedBtn");
var unresolveForm = document.getElementById("unresolveForm");
UnresolvedBtn.addEventListener("click", function(ev){
    unresolveForm.submit();
})

})()
</script>
</body>
</html>