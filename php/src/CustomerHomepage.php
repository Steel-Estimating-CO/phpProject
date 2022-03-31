<?php
include ('includes/conn.inc.php');
if(isset($_GET))
{
    $sqli = "SELECT UserID, Firstname, Lastname, Username, Email, Usertype FROM Users WHERE UserID=24";
    $result = mysqli_query($mysqli, $sqli);
    $row = mysqli_fetch_array($result);
}
?>
<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed, estimatorID FROM Listings WHERE userID=24 AND Claimed=0");
$stmt->execute();
$stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed, $estimatorID);
$stmt->store_result();
$numRows = $stmt->num_rows;
?>
<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed, estimatorID FROM Listings WHERE userID=24 AND Claimed=3");
$stmt->execute();
$stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed, $estimatorID);
$stmt->store_result();
$numOfRows = $stmt->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CustomerDesign.css" type="text/css">
    <title>Document</title>
</head>
<body>

    <div class="MenuBar">
    <div class="ProfilePic1"></div>
    <p class="namer">Matt Gaffoor</p>
    <p class="roler">(Customer)</p>
    <div class="MenuOptions1" onclick="location.href='CustomerHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerSettings.php'"><p class="MenuTxt">Account Settings</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerJobPosting.php'"><p class="MenuTxt">Post a Job</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerActiveJobs.php'"><p class="MenuTxt">Active Job List</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerAcceptedJobs.php'"><p class="MenuTxt">Accepted Jobs</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerPrevJobs.php'"><p class="MenuTxt">Previous Jobs</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerNewComplaint.php'"><p class="MenuTxt">Submit Complaint</p></div>
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
        <p class="AdminInfo">Active Jobs</p>
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
        <p class="AdminInfo">Accepted Jobs</p>
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