<?php
include ('includes/conn.inc.php');
    session_start();
    if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"] === true){  
        header("location: Welcome.php");
        exit;
     //  add switch case here
    }
 
    // Define variables and initialize with empty values
    $Username = $Password = "";
    $Username_err = $Password_err = $login_err = "";
     
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
        // Check if Username is empty
        if(empty(trim($_POST["Username"]))){
            $Username_err = "Please enter Username.";
        } else{
            $Username = trim($_POST["Username"]);
        }
        
        // Check if Password is empty
        if(empty(trim($_POST["Password"]))){
            $Password_err = "Please enter your Password.";
        } else{
            $Password = trim($_POST["Password"]);
        }
        
        // ValuserIDate credentials
        if(empty($Username_err) && empty($Password_err)){
            // Prepare a select statement
            $sql = "SELECT userID, Username, Password FROM Users WHERE Username = ?";
            
            if($stmt = mysqli_prepare($mysqli, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_Username);
                
                // Set parameters
                $param_Username = $Username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if Username exists, if yes then verify Password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $userID, $Username, $hashed_Password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(Password_verify($Password, $hashed_Password)){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["userID"] = $userID;
                                $_SESSION["Username"] = $Username;                            
                                
                                // Redirect user to welcome page
                                header("location: Welcome.php");
                            } else{
                                // Password is not valuserID, display a generic error message
                                $login_err = "Invalid Username or Password.";
                            }
                        }
                    } else{
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid Username or Password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
            }
        }
        
        // Close connection
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
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="Username" class="form-control <?php echo (!empty($Username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Username; ?>">
                <span class="invalid-feedback"><?php echo $Username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" class="form-control <?php echo (!empty($Password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $Password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>