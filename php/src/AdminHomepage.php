<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT Firstname, Lastname, Username, Email, Usertype, Auth FROM Users WHERE Auth=0");
$stmt->execute();
$stmt->bind_result($Firstname, $Lastname, $Username, $Email, $Usertype, $Auth);
$stmt->store_result();
$numRows = $stmt->num_rows;
?>
<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT UserID, UserDate, UserEmail, Category, UserSubject, Complete FROM Complaints WHERE Complete=0");
$stmt->execute();
$stmt->bind_result($UserID, $UserDate, $UserEmail, $Category, $UserSubject, $Complete);
$stmt->store_result();
$numOfRows = $stmt->num_rows;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminLayout.css" type="text/css">
    <title>Admin Homepage</title>
</head>
<body>
    <div class="MenuBar">
    <div class="MenuOptions1" onclick="location.href='AdminHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions"><p class="MenuTxt">Account Settings</p></div>
    <div class="MenuOptions" onclick="location.href='AdminNewUsers.php'"><p class="MenuTxt">User Approvals</p></div>
    <div class="MenuOptions"><p class="MenuTxt">User List</p></div>
    <div class="MenuOptions" onclick="location.href='AdminNewComplaint.php'"><p class="MenuTxt">User Complaints</p></div>
    <div class="MenuOptions"><p class="MenuTxt">Payments</p></div>
    <div class="MenuOptions"><p class="MenuTxt">New Listings</p></div>
    </div>
    <div class="InfoBoxes">
        <?php
                    if ($numRows == 0)
                    {
                        echo "<div class=\"RowZero\">";
                    }
                    else
                    {
                        echo "<div class=\"RowExtends\">";
                    }
                    echo $numRows;
                    echo "</div>";
        ?>
        <p class="AdminInfo">User Approvals</p>
    </div>
    <div class="InfoBoxes">
        <?php
                    if ($numOfRows == 0)
                    {
                        echo "<div class=\"RowZero\">";
                    }
                    else
                    {
                        echo "<div class=\"RowExtends\">";
                    }
                    echo $numOfRows;
                    echo "</div>";
        ?>
    <p class="AdminInfo">Complaint List</p>
    </div>
    <div class="InfoBoxes">
            <div class="RowExtends"></div>
            <div class="RowZero">0</div>
    <p class="AdminInfo">Payments</p>
    </div>

    </div>
    <div class="InfoBoxes"></div>
    <div class="ProfilePic">
    <div class="UploadPhoto"> <p class="UploadText">Upload Image</p></div>
    </div>
    <div class="ProfileInfo"></div>
    <div class="ProfileDesc"></div>
</body>
</html>