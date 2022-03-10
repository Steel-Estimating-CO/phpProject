<?php
include ('includes/conn.inc.php');
?>
<html>
<h1>
Steel Estimating <br>
</h1>
<h2 class="title">Complaint Info</h2>
                    <form action="AdminComplaints.php" method="POST">
<div class="wrap-input100" >
    <div class="input-group">
        <input class="input--style-3" type="number" placeholder="User ID" name="UserID">
    </div>
</div>
    <div class="input-group">
        <input class="input--style-3" type="date" placeholder="Date" name="UserDate">
    </div>

    <div class="input-group">
        <input class="input--style-3" type="Email" placeholder="Email" name="UserEmail">
    </div>

    <select name="Category" id="Category">
        <option value="JobPosting">Job Posting</option>
        <option value="Payments">Payments</option>
        <option value="Other">Other</option>
    </select>

    <textarea rows="4" cols="50" placeholder="Enter Text Here..." name="UserSubject"></textarea>

	<div class="p-t-10">
        <button type="submit" name="submit" > Submit </button>
    </div>
</hi>
</html>