<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT UserID, Firstname, Lastname, Username, Email, Usertype, Auth FROM Users");
$stmt->execute(); 
$stmt->bind_result($UserID, $Firstname, $Lastname, $Username, $Email, $Usertype, $Auth);

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
<p class="NewUserHeader">New Users:</p>
<table class="NewUserTable">
    <tr>
        <th>First Name &emsp;</th>
        <th>Last Name &emsp;</th>
        <th>Username &emsp;</th>
        <th>Email Address &emsp;</th>
        <th>User Type &emsp;</th>
        <th>Authenticated &emsp;</th>
    </tr>
    <?php

        while ($stmt->fetch()) 
        {
            if ($Auth == 0)
            {
            echo "<tr>";
            echo "<td> &emsp; $Firstname </td>";
            echo "<td> &emsp; $Lastname </td>";
            echo "<td> &emsp; $Username </td>";
            echo "<td>  $Email </td>";
            echo "<td>  $Usertype </td>";
            echo "<td>";

            echo "<Form action=\"process/acceptdecline.php\" method=\"post\">";
            echo "<select class=\"UserOptions\" name=\"Auth\">";
                echo "<option value=\"1\"";
                if($Auth == 1){
                    echo " selected";
                }
                echo ">Accept</option>";
                echo "<option value=\"-1\"";
                if($Auth == 0){
                    echo " selected";
                }
                echo ">Decline</option>";
                echo "</option>";
                echo "</select>";
                echo "<input type=\"hidden\" name=\"UserID\" value=\"$UserID\">";
                echo "<input type=\"submit\">";
                echo "</form>";
            echo "</td>";
            echo "</tr>"; 
            }
        }
    ?>
</table>

</body>
</html>