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
    <title>Document</title>
</head>
<body>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email Address</th>
        <th>User Type</th>
        <th>Authenticated</th>
    </tr>
<?php
    while ($stmt->fetch()) 
{
    echo "<tr>";
    echo "<td> &emsp; $Firstname </td>";
    echo "<td> &emsp; $Lastname </td>";
    echo "<td> &emsp; $Username </td>";
    echo "<td> &emsp; $Email </td>";
    echo "<td> &emsp; $Usertype </td>";
    echo "<td> &emsp; $Auth </td>";
    echo "</tr>";
}
?>
</table>

</body>
</html>