<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT Firstname, Lastname, Username, Email, Usertype, Auth FROM Users");
$stmt->execute(); 
$stmt->bind_result($Firstname, $Lastname, $Username, $Email, $Usertype, $Auth);

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

            echo "<select class=\"UserOptions\">";
                echo "<option value=\"Accept\">Accept";
                echo "<option value=\"Decline\">Decline";
                echo "</option>";
                echo "</select>";
            echo "</td>";
            echo "</tr>"; 
            }
        }


        function AcceptUser() 
        {
            echo "Hello world!";
        }
    ?>
</table>

</body>
</html>