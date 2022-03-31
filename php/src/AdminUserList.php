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
<p class="NewUserHeader">New Users:</p>
<table class="NewUserTable">
    <tr>
        <th>Id Number &emsp;</th>
        <th>First Name &emsp;</th>
        <th>Last Name &emsp;</th>
        <th>Username &emsp;</th>
        <th>Email Address &emsp;</th>
        <th>User Type &emsp;</th>
    </tr>

    <div class="SearchBar">
        <form action="" method="GET">
            <div class="input-group mb-3">
            <input type="text" class="searchbar" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search...">
            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    </div>

<?php
    include ('includes/conn.inc.php');
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM Users WHERE CONCAT(Firstname, Lastname, Username, Email, Usertype) LIKE '%$filtervalues%'";
        $query_run = mysqli_query($mysqli, $query);
    
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
            ?>
                <tr>
                <td><?= $items['userID']; ?></td>
                <td><?= $items['Firstname']; ?></td>
                <td><?= $items['Lastname']; ?></td>
                <td><?= $items['Username']; ?></td>
                <td><?= $items['Email']; ?></td>
                <td><?= $items['Usertype']; ?></td>
                </tr>
                <?php
            }
        }
    }
    else
    {
        ?>
            <tr>
                <td colspan="6">No Records Found!</td>
            </tr>
        <?php
    }
    ?>
</table>

</body>
</html>