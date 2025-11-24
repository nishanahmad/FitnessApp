<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../connect.php';

ini_set('session.gc_maxlifetime', 14400);
ini_set('session.cookie_lifetime', 14400);

session_start();
if(isset($_SESSION["user_name"]))
{
	$name = $_POST['name'];
	$brand = $_POST['brand'];
	$unit = $_POST['unit'];
	$qty = $_POST['qty'];
	$calories = $_POST['calories'];
	if(!empty($_POST['protein']))
		$protein = $_POST['protein'];
	else
		$protein = 0;
	if(!empty($_POST['carb']))
		$carb = $_POST['carb'];
	else
		$carb = 0;
	if(!empty($_POST['fat']))
		$fat = $_POST['fat'];
	else
		$fat = 0;
	if(!empty($_POST['fibre']))
		$fibre = $_POST['fibre'];
	else
		$fibre = 0;
	if(!empty($_POST['sugar']))
		$sugar = $_POST['sugar'];
	else
		$sugar = 0;
			
	$sql="INSERT INTO items (name, brand, unit, qty, calories, protein, carb, fat, fibre, sugar)
		 VALUES
		 ('$name', '$brand', '$unit', '$qty', '$calories', '$protein', '$carb', '$fat', '$fibre', '$sugar')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
			
	header( "Location: ../index.php" );
}
else
	header( "Location: ../index.php" );
?>