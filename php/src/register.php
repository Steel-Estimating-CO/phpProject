<?php
include_once 'includes/Alerts.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/conn.inc.php';
    if ($_POST['submit'] == 'register') {
        $stmt = $mysqli->prepare("INSERT INTO Users(Firstname, Lastname, Email, Username, Usertype) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss',
            $_POST['Firstname'],
            $_POST['Lastname'],
            $_POST['Email'],
            $_POST['Username'],
            $_POST['Usertype']);
        $stmt->execute();
        $userId = $stmt->insert_id;
        if($stmt->errno > 0)
            $alert = new Alerts('danger',$stmt->error);
        else
            $alert = new Alerts('success', "Account Created Successfully!");
        
        $stmt->close();
    }
}

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
        <h2>
            Sign Up
        </h2>
        <p>Please fill the form to create new account.</p>

        <?= isset($alert) ? $alert->fire_alert() : '' ?>

        <Form method="post" action="">
            <input type="hidden" name="Usertype" value="estimator">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="Firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="Lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="Username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="Password" class="form-control" required>
            </div>
            <div class="form-group d-flex justify-content-between align-items-center">
                <input type="submit"class="btn btn-primary" name="submit" value="register">
                <a href="LoginPage.php">Already have an account ?</a>
            </div>
        </form>
    </div>
</body>
</html>
