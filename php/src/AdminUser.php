<?php
include ('includes/conn.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginStyle.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <h1 class="sec">Steel Estimating Co</h1>

<div class="inputbox">
        <h2 class="title">Registration Info</h2>
        <form action="AdminForm.php" method="POST">
        <div class="wrap-input100" >
        <div class="input-group">
            <p class="word">First Name: </p><input class="input" type="name" placeholder="First Name" name="Firstname" required>
        </div>
        </div>
        <div class="input-group">
            <p class="word">Surname: </p><input class="input" type="name" placeholder="Last Name" name="Lastname" required>
        </div>

        <div class="input-group">
            <p class="word">Username: </p><input class="input" type="Username" placeholder="User Name" name="Username" required>
        </div>

        <div class="input-group">
            <p class="word">&nbsp &nbsp Email Adress: </p><input class="input" type="Email" placeholder="Email" name="Email" required>
        </div>

        <p class="ut">Select User Type: </p> <select name="Usertype" id="Usertype">
            <option value="Customer">Customer</option>
            <option value="Estimator">Estimator</option>
        </select>

        <div class="p-t-10">
            <button class="btn" type="submit" name="signup" > Signup </button>
        </div>	
</div>				
</hi>
</body>
</html>