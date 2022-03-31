<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT UserID, Firstname, Lastname, Username, Email FROM Users WHERE UserID=24");
$stmt->execute();
$stmt->bind_result($UserID, $Firstname, $Lastname, $Username, $Email);
$stmt->store_result();

if(isset($_GET))
{
    $sqli = "SELECT UserID, Firstname, Lastname, Username, Email, Usertype FROM Users WHERE UserID=24";
    $result = mysqli_query($mysqli, $sqli);
    $row = mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CustomerDesign.css" type="text/css">
    <title>Admin Homepage</title>
</head>
<body>
<div class="MenuBar">
    <div class="ProfilePic1"></div>
    <p class="namer">Matt Gaffoor</p>
    <p class="roler">(Customer)</p>
    <div class="MenuOptions1" onclick="location.href='CustomerHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions" ><p class="MenuTxt">Account Settings</p></div>
    <div class="MenuOptions" ><p class="MenuTxt">Post a Job</p></div>
    <div class="MenuOptions" ><p class="MenuTxt">Active Job List</p></div>
    <div class="MenuOptions" ><p class="MenuTxt">Previous Jobs</p></div>
    <div class="MenuOptions"><p class="MenuTxt">Send Payment</p></div>
    </div>

    <div class="JobInfo">
    <h1 class="AccS">New Job Details:</h1>

    <form action="CustomerNewJob.php" method="POST">
    <label class="IDlbl">User ID Number:</label><input class="Itxt" type="text" name="userID" placeholder="UserID" value="<?php echo $row['UserID']; ?>" readonly><br/><br/>
    
    <p class="ut">Select Job Type:</p><select name="Type" id="Type">
            <option value="Personal">Personal</option>
            <option value="Business">Business</option>
        </select>

    <textarea class="tb" rows="4" cols="90" placeholder="Enter Text Here..." name="Description"></textarea>
    </form>

    <div class="p-t-10">
        <button class="Subbtn" type="submit" name="submit" > Submit </button>
    </div>
    
    </div>
</div>
</body>
</html>