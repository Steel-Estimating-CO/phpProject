<?php
include ('includes/conn.inc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Estimator Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?= isset($alert) ? $alert->fire_alert() : '' ?>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <Form method="post" action="LoginPage.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="Username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" class="form-control">
            </div>
            <div class="form-group d-flex justify-content-between align-items-center">
                <input type="submit"class="btn btn-primary" value="Login">
                <a href="register.php">Create new account ?</a>
            </div>
        </form>
    </div>
<?php
if(isset($_POST['Login']))
{
    $Username = $_POST['Username'];
    $Pass = $_POST['Password'];

    $stmt = mysqli->prepare("SELECT Username, Passowrd, userID FROM Users WHERE Username = '$Username' AND Pass = '$Pass'");
    $row = mysqli_fetch_array($select);

    if(is_array($row))
    {
        $_SESSION["Username"]  = $row ['Username'];
        $_SESSION["Password"]  = $row ['Password'];
    }
        else
        {
           echo '<script type = "text/javascript">';
           echo 'alert("Invalid Username or Passoord)';
           echo 'window.location.href = "LoginPage.php"';
           echo '</script>';
        }
    if(isset($_SESSION["Username"]))
    {
        header("Location:EstimatorHomepage.php");
    }
}
?>

</body>
</html>
