<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../connect.php';

session_start();
if(isset($_SESSION["user_name"]))
{
	$weight = $_POST['weight'];
			
	$sql="INSERT INTO weight_log (weight)
		 VALUES
		 ('$weight')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
			
	header( "Location: ../index.php" );
}
else
	header( "Location: ../index.php" );
?>
