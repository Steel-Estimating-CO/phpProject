<?php
session_start();
$con =mysqli_connect ("localhost", "root", "" );
if ($con){
 	//echo "Connection Successful <br>";
}
else {
	echo "Connection failed";
}
$connect= mysqli_select_db ( $con, "steelEstimatingco" );
if ($connect){
	//echo "Database Connection Successful"; 
	
}
	else {
		echo "Database Connection failed";
	}

//singnupForm
	if (isset($_POST['signup'])) {

	$Firstname=$_POST['Firstname'];
	$Lastname=$_POST['Lastname'];
	$Username=$_POST['Username'];
	$Email=$_POST['Email'];
	$Mobile=$_POST['Mobile'];
	$Usertype=$_POST['Usertype'];
	
	$sql = "INSERT INTO `user` (`Firstname`, `Lastname`, `Username`, `Email`, `Mobile`, `Usertype`) VALUES ('$Firstname', '$Lastname', '$Username', '$Email', '$Mobile', '$Usertype')";
	echo "$sql";
	$query = mysqli_query($con, $sql);
	if ($query) {

		echo "<script> alert('User Register Successfully'); 
		window.location.href = 'demo1.php';</script>"; 
	}
	else
	{
		echo "Register Failed";
	}
}
?>