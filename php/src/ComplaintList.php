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
    echo "<Form action=\"process/ResolvedUnresolved.php\" method=\"post\">";
    echo "<div class=\"CompOption\" value=\"1\" name=\"Complete\"><p class=\"CompText\">Resolved</p></div>";
    echo "<input type=\"hidden\" name=\"CaseID\" value=\"$CaseID\">";
    echo "</form>";
?>


<div class="CompOption"><p class="CompText">Send Email</p></div>
<div class="CompOption"><p class="CompText">Unresolved</p></div>

</div>
</body>
</html>