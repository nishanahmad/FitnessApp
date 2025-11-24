<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../connect.php';

ini_set('session.gc_maxlifetime', 14400);
ini_set('session.cookie_lifetime', 14400);

session_start();
if(isset($_SESSION["user_name"]))
{
	//$date = $_POST['date'];
	//$sqlDate = date("Y-m-d", strtotime($date));
	$sqlDate = date("Y-m-d");
	$type = $_POST['type'];
	$item = $_POST['item'];
	$qty = $_POST['qty'];
			
	$sql="INSERT INTO meals (date, meal_type, item, qty)
		 VALUES
		 ('$sqlDate', '$type','$item', '$qty')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
			
	header( "Location: ../index.php" );
}
else
	header( "Location: ../index.php" );
?>
