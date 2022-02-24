<?php
include ('includes/conn.inc.php');
?>
<html>
<h1>
Steel Estimating <br> 
</h1>
<h2 class="title">Registration Info</h2>
                    <form action="AdminForm.php" method="POST">
<div class="wrap-input100" >
<div class="input-group">
                            <input class="input--style-3" type="name" placeholder="First Name" name="Firstname">
                        </div>


					
					</div><div class="input-group">
                            <input class="input--style-3" type="name" placeholder="LastName" name="Lastname">
                        </div>

					<div class="input-group">
                            <input class="input--style-3" type="Username" placeholder="UserName" name="Username">
                        </div>

						<div class="input-group">
                           <input class="input--style-3" type="Email" placeholder="Email" name="Email">
                        </div>

                        <select name="Usertype" id="Usertype">
                            <option value="Customer">Customer</option>
                            <option value="Estimator">Estimator</option>
                        </select>

						<div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="signup" > Signup </button>
                        </div>


						
</hi>
</html>