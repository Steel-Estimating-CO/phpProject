<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT UserID, Firstname, Lastname, Username, Email FROM Users WHERE UserID=55");
$stmt->execute();
$stmt->bind_result($UserID, $Firstname, $Lastname, $Username, $Email);
$stmt->store_result();

if(isset($_GET))
{
    $sqli = "SELECT Firstname, Lastname, Username, Email FROM Users WHERE UserID=55";
    $result = mysqli_query($mysqli, $sqli);
    $row = mysqli_fetch_array($result);
}
if(isset($_POST['btn-update']))
{
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $update = "UPDATE Users SET Firstname='$Firstname', Lastname='$Lastname', Username='$Username', Email='$Email' WHERE UserID=55";
    $up = mysqli_query($mysqli, $update);
    if(!isset($sqli))
    {
        die ("Error $sqli" .mysqli_connect_error());
    }
    else
    {
        header("location: AdminHomepage.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminAccountSettings.css" type="text/css">
    <title>Admin Homepage</title>
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
    </div>
    <h1 class="as">Account Settings:</h1>
    <div class="ProfilePic">
    <div class="UploadPhoto"> <p class="UploadText">Change Profile Picture</p></div>
    </div>

    <div class="ProfileInfo">
    <form method="post">
    <label class="Ilbl">First Name: &nbsp &nbsp </label><input class="Itxt" type="text" name="Firstname" placeholder="Firstname" value="<?php echo $row['Firstname']; ?>"><br/><br/>
    <label class="Ilbl">Surname: &nbsp &nbsp &nbsp &nbsp   </label><input class="Itxt" type="text" name="Lastname" placeholder="Lastname" value="<?php echo $row['Lastname']; ?>"><br/><br/>
    <label class="Ilbl">Username: &nbsp &nbsp &nbsp   </label><input class="Itxt" type="text" name="Username" placeholder="Username" value="<?php echo $row['Username']; ?>"><br/><br/>
    <label class="Ilbl">Email Address:</label><input class="Itxt" type="text" name="Email" placeholder="Email" value="<?php echo $row['Email']; ?>"><br/><br/>
    <button type="submit" class="Sbtn" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
    <a href="index.php"><button type="button" class="Cbtn" value="button">Sign Out</button></a>
    </form>
<script>
    function update()
    {
        var x;
        if(confirm("Updated data Sucessfully") == true)
        {
            x="update";
        }
}
</script>
</div>
</body>
</html>