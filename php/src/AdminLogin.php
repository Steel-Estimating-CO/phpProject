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
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <Form method="post" action="AdminHomepage.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="Username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit"class="btn btn-primary" value="Login">
                <a href="register.php">Create new account ?</a>
            </div>
        </form>
    </div>
</body>
</html>