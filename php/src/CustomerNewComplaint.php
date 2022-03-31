<?php
include ('includes/conn.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CustomerComplaintStyle.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div class="inputbox">
    <h1>
    Steel Estimating <br>
    </h1>
    <h2 class="title">Complaint Info</h2>
                        <form action="CustomerComplaints.php" method="POST">
    <div class="wrap-input100" >
        <div class="input-group">
        <p class="word">User ID Number: </p><input class="input" type="number" placeholder="User ID" name="UserID" required="" oninvalid="this.setCustomValidity('Found on your profile page')"
                                                                                                                                oninput="setCustomValidity('')">
        </div>
        </div>
        <div class="input-group">
        <p class="word1">Today's Date: </p><input class="input" type="date" placeholder="Date" name="UserDate" required>
        </div>

        <div class="input-group">
        <p class="word">Email Address: </p><input class="input" type="Email" placeholder="Email" name="UserEmail" required>
        </div>

        <p class="ut">Select Complaints Catagory: </p> <select name="Category" id="Category">
            <option value="JobPosting">Job Posting</option>
            <option value="Payments">Payments</option>
            <option value="Other">Other</option>
        </select>

        <textarea class="tb" rows="4" cols="80" placeholder="Enter Text Here..." name="UserSubject"></textarea>

        <div class="p-t-10">
            <button class="btn" type="submit" name="submit" > Submit </button>
        </div>
    </hi>
</div>
</body>
</html>