<?php
    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT Firstname, Lastname, Username, Email, Usertype, Auth FROM Users");
    $stmt->execute();
    $stmt->bind_result($Firstname, $Lastname, $Username, $Email, $Usertype, $Auth);
    $stmt->store_result();
    $numRows = $stmt->num_rows;
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
    <div class="MenuBar"></div>
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
    </div>
    <div class="InfoBoxes"></div>
    <div class="InfoBoxes"></div>
    <div class="InfoBoxes"></div>
    <div class="ProfilePic">
    <div class="UploadPhoto"> <p class="UploadText">Upload Image</p></div>
    </div>
    <div class="ProfileInfo"></div>
    <div class="ProfileDesc"></div>
</body>
</html>