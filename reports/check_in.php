<?php

ini_set('session.gc_maxlifetime', 14400);
ini_set('session.cookie_lifetime', 14400);

session_start();
if(isset($_SESSION["user_name"]))
{
	require '../connect.php';
	require '../navbar.php';
	
	
	if(date('N') != 1)
		$fromDate = date('Y-m-d', strtotime("last Monday"));
	else
		$fromDate = date("Y-m-d");
	
	$toDate = date("Y-m-d");

	$start = new DateTime($fromDate);
	$end   = new DateTime($toDate);

	$diff = $start->diff($end);

	$days = $diff->days + 1;

	$Calories = 0;
	$Protein = 0;
	$Fibre = 0;
	$Sugar = 0;
		
	$meals = mysqli_query($con, "SELECT * FROM meals WHERE date >= '$fromDate' AND date <= '$toDate'") or die(mysqli_error($con));	
	foreach($meals as $meal)
	{
		$itemId = $meal['item'];
		$itemSql = mysqli_query($con, "SELECT * FROM items WHERE id = '$itemId'") or die(mysqli_error($con));	
		$item = mysqli_fetch_array($itemSql, MYSQLI_ASSOC);
		
		$mealCalories = $item['calories'] * $meal['qty']/ $item['qty'];
		$Calories = $Calories + $mealCalories;
		
		$mealProtein = $item['protein'] * $meal['qty']/ $item['qty'];
		$Protein = $Protein + $mealProtein;
		
		$mealFibre = $item['fibre'] * $meal['qty']/ $item['qty'];
		$Fibre = $Fibre + $mealFibre;

		$mealSugar = $item['sugar'] * $meal['qty']/ $item['qty'];
		$Sugar = $Sugar + $mealSugar;		
		
	}
	$Calories = round($Calories/$days,0);
	$Protein = round($Protein/$days,0);
	$Fibre = round($Fibre/$days,0);
	$Sugar = round($Sugar/$days,0);
	
	$targetMap = array();
	$targets = mysqli_query($con, "SELECT * FROM daily_target") or die(mysqli_error($con));	
	foreach($targets as $target)
	{
		$targetMap[$target['name']] = $target['target'];
	}
	
																																								?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calorie Tracker</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fdfbf9;
      margin: 0;
      padding: 0;
    }
    .header {
      padding: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header-title {
      font-weight: 700;
      font-size: 1.2rem;
      color: #d96b4c;
    }
    .profile-img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
    }
    .profile-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .card-summary {
      background: #fff;
      border-radius: 1rem;
      padding: 1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      text-align: center;
    }
    .big-number {
      font-family: 'Nunito Sans', sans-serif;
      font-size: 2rem;
      font-weight: 700;
    }
    .macro-card {
      background: #f6f1eb;
      border-radius: 1rem;
      padding: 1rem;
    }
    .meal-card {
      background: #fff;
      border-radius: 1rem;
      padding: 0.8rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      margin-bottom: 0.8rem;
    }
    .meal-icon {
      background: #f6f1eb;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 1.2rem;
    }

  </style>
</head>
<body>

  <div class="container-custom">
    <!-- Header -->
    <div class="header">
      <div class="header-title"><i class="bi bi-egg-fried"></i> Calorie Tracker</div>
      <div class="profile-img">
        <img src="https://via.placeholder.com/40" alt="Profile">
      </div>
    </div>

    <!-- Summary -->
    <div class="card-summary mb-3">
      <div class="row">
        <div class="col">
          <div class="big-number"><?php echo $Calories;?>/<?php echo $targetMap['Calories'];?></div>
        </div>
      </div>
    </div>

    <!-- Macros -->
	<div class="macro-card mb-3">

	  <div class="d-flex justify-content-between mb-1">
		<span>Protein</span>
		<span class="fw-semibold text-muted"><?php echo $Protein;?>/<?php echo $targetMap['Protein'];?></span>
	  </div>
	  <div class="progress mb-3">
		<div class="progress-bar bg-info" style="width: 33%"></div>
	  </div>

	  <div class="d-flex justify-content-between mb-1">
		<span>Fibre</span>
		<span class="fw-semibold text-muted"><?php echo $Fibre;?>/<?php echo $targetMap['Fibre'];?></span>
	  </div>
	  <div class="progress mb-3">
		<div class="progress-bar bg-warning" style="width: 50%"></div>
	  </div>

	  <div class="d-flex justify-content-between mb-1">
		<span>Sugar</span>
		<span class="fw-semibold text-muted"><?php echo $Sugar;?>/<?php echo $targetMap['Sugar'];?></span>
	  </div>
	  <div class="progress">
		<div class="progress-bar bg-primary" style="width: 15%"></div>
	  </div>
	</div>

</body>
</html>

<?php
}
else
	header("Location:../sessions/loginPage.php");																													?>