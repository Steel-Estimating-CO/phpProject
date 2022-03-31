<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT UserID, Firstname, Lastname, Username, Email, Usertype, Auth FROM Users WHERE Auth=0");
$stmt->execute();
$stmt->bind_result($UserID, $Firstname, $Lastname, $Username, $Email, $Usertype, $Auth);
$stmt->store_result();
$numRows = $stmt->num_rows;

if(isset($_GET))
{
    $sqli = "SELECT UserID, Firstname, Lastname, Username, Email, Usertype FROM Users WHERE UserID=55";
    $result = mysqli_query($mysqli, $sqli);
    $row = mysqli_fetch_array($result);
}
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
    <script src="note.js" defer></script>
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
    <div class="InfoBoxes">
    <div class="RowExtends"></div>
            <div class="RowZero">0</div>
    <p class="AdminInfo">New Listings</p>
    </div>
    <div class="ProfilePic">
    </div>
    <div class="ProfileInfo">
    <form method="post">
    <label class="Ilbl">User ID Number:</label><input class="Itxt" type="text" name="UserID" placeholder="UserID" value="<?php echo $row['UserID']; ?>" readonly><br/><br/>
    <label class="Ilbl">First Name: &nbsp &nbsp &nbsp &nbsp </label><input class="Itxt" type="text" name="Firstname" placeholder="Firstname" value="<?php echo $row['Firstname']; ?>" readonly><br/><br/>
    <label class="Ilbl">Surname: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   </label><input class="Itxt" type="text" name="Lastname" placeholder="Lastname" value="<?php echo $row['Lastname']; ?>" readonly><br/><br/>
    <label class="Ilbl">Username: &nbsp &nbsp &nbsp &nbsp &nbsp   </label><input class="Itxt" type="text" name="Username" placeholder="Username" value="<?php echo $row['Username']; ?>" readonly><br/><br/>
    <label class="Ilbl">Email Address: &nbsp </label><input class="Itxt" type="text" name="Email" placeholder="Email" value="<?php echo $row['Email']; ?>" readonly><br/><br/>
    <label class="Ilbl">User Type: &nbsp &nbsp &nbsp &nbsp &nbsp</label><input class="Itxt" type="text" name="Usertype" placeholder="Usertype" value="<?php echo $row['Usertype']; ?>" readonly><br/><br/>
    </form>

    </div>
    <div class="ProfileDesc">
        
    </div>
</body>
</html>