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
    <style>
        .resolvedBtnRed{
            background-color: #f00;
            color:#fff;
        }
        .resolvedBtnGreen{
            background-color: #50C878;
            color:#fff; 
        }

    </style>
</head>
<body>

<div class="MenuBar"></div>
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
    // not sure of the business logic but example
    if($Complete == 0){
        $newCompleteVal = 1;
        $btnClass = "resolvedBtnRed";
    }
    if($Complete == 1){
        $newCompleteVal = -1;
        $btnClass = "resolvedBtnGreen";
    }
    echo "<div class=\"CompOption $btnClass\" ><p class=\"CompText\" id=\"resolveBtn\">Resolved</p></div>";
    echo "<input type=\"hidden\" name=\"CaseID\" value=\"$CaseID\">";
    echo "<input type=\"hidden\" name=\"Complete\" value=\"$newCompleteVal\">";
    echo "</form>";
?>


<div class="CompOption"><p class="CompText">Send Email</p></div>
<div class="CompOption"><p class="CompText">Unresolved</p></div>

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
</body>
</html>