<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT Firstname, Lastname, Username, Email, Usertype, Auth FROM Users WHERE UserID = ?");
$stmt->bind_param('i', $_GET["UserID"]);
$stmt->execute(); 
$stmt->bind_result($Firstname, $Lastname, $Username, $Email, $Usertype, $Auth);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table style="width:100%">
    <tr>
        <td>Column 1</td>
        <td>Column 2</td>
        <td>Column 3</td>
    </tr>
    <tr>
        <td>Value 1</td>
        <td> Value 2</td>
        <td> Value 3</td>
    </tr>
</table>

</body>
</html>