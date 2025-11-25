<?php

ini_set('session.gc_maxlifetime', 14400);
ini_set('session.cookie_lifetime', 14400);

session_start();
if(isset($_SESSION["user_name"]))
{
	require '../connect.php';
	require '../navbar.php';
	
	if(isset($_GET['date']))
		$date = date("Y-m-d",strtotime($_GET['date']));
	else
		$date = date("Y-m-d");

	$todayFlag = false;
	if($date == date("Y-m-d"))
		$todayFlag = true;

	$calories = 0;
	$protein = 0;
	$fibre = 0;
	$sugar = 0;
	
	$mealDetailsMap = array();
	$mealDetailsMap['Breakfast'] = array();
	$mealDetailsMap['Lunch'] = array();
	$mealDetailsMap['Snack'] = array();
	$mealDetailsMap['Dinner'] = array();
	
	$meals = mysqli_query($con, "SELECT * FROM meals WHERE date = '$date'") or die(mysqli_error($con));	
	foreach($meals as $meal)
	{
		$itemId = $meal['item'];
		$itemSql = mysqli_query($con, "SELECT * FROM items WHERE id = '$itemId'") or die(mysqli_error($con));	
		$item = mysqli_fetch_array($itemSql, MYSQLI_ASSOC);
		
		$mealCalories = $item['calories'] * $meal['qty']/ $item['qty'];
		$calories = $calories + $mealCalories;
		
		$mealProtein = $item['protein'] * $meal['qty']/ $item['qty'];
		$protein = $protein + $mealProtein;
		
		$mealFibre = $item['fibre'] * $meal['qty']/ $item['qty'];
		$fibre = $fibre + $mealFibre;

		$mealSugar = $item['sugar'] * $meal['qty']/ $item['qty'];
		$sugar = $sugar + $mealSugar;		
		
		$mealDetailsMap[$meal['meal_type']][] = $item['name'].' '.$mealCalories;
	}
	$calories = round($calories,0);
	$protein = round($protein,1);
	$fibre = round($fibre,1);
	$sugar = round($sugar,1);
	
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
          <div class="big-number"><?php echo $calories;?>/<?php echo $targetMap['calories'];?></div>
        </div>
      </div>
    </div>

    <!-- Macros -->
	<div class="macro-card mb-3">

	  <div class="d-flex justify-content-between mb-1">
		<span>Protein</span>
		<span class="fw-semibold text-muted"><?php echo $protein;?>/<?php echo $targetMap['protein'];?></span>
	  </div>
	  <div class="progress mb-3">
		<div class="progress-bar bg-info" style="width: 33%"></div>
	  </div>

	  <div class="d-flex justify-content-between mb-1">
		<span>Fibre</span>
		<span class="fw-semibold text-muted"><?php echo $fibre;?>/<?php echo $targetMap['fibre'];?></span>
	  </div>
	  <div class="progress mb-3">
		<div class="progress-bar bg-warning" style="width: 50%"></div>
	  </div>

	  <div class="d-flex justify-content-between mb-1">
		<span>Sugar</span>
		<span class="fw-semibold text-muted"><?php echo $sugar;?>/<?php echo $targetMap['sugar'];?></span>
	  </div>
	  <div class="progress">
		<div class="progress-bar bg-primary" style="width: 15%"></div>
	  </div>

	</div>

    <!-- Meals -->
    <h6 class="fw-bold mb-3 text-center">Today</h6>
	<div class="meal-card" onclick="breakfast()">
	  <div class="d-flex align-items-center">
		<div class="meal-icon"><i class="bi bi-cup-hot"></i></div>
		<div class="ms-2">
		  <div class="fw-bold">Breakfast</div><?php
		  foreach($mealDetailsMap['Breakfast'] as $index => $detail)
		  {																		?>
				<small class="text-muted"><?php echo $detail. ' kcal<br/>';?></small><?php
		  }																		?>
		</div>
	  </div>
	  <div><i class="bi bi-plus-circle"></i></div>
	</div>
    <div class="meal-card" onclick="lunch()">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-egg"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Lunch</div><?php
		  foreach($mealDetailsMap['Lunch'] as $index => $detail)
		  {																		?>
				<small class="text-muted"><?php echo $detail. ' kcal<br/>';?></small><?php
		  }																		?>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>

    <div class="meal-card" onclick="snack()">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-cookie"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Snack</div><?php
		  foreach($mealDetailsMap['Snack'] as $index => $detail)
		  {																		?>
				<small class="text-muted"><?php echo $detail. ' kcal<br/>';?></small><?php
		  }																		?>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>
    <div class="meal-card" onclick="dinner()">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-fork-knife"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Dinner</div><?php
		  foreach($mealDetailsMap['Dinner'] as $index => $detail)
		  {																		?>
				<small class="text-muted"><?php echo $detail. ' kcal<br/>';?></small><?php
		  }																		?>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>
  </div>


<script>
function breakfast()
{
    window.location = "../meals/new.php?meal=breakfast";
}
function lunch()
{
    window.location = "../meals/new.php?meal=lunch";
}
function snack()
{
    window.location = "../meals/new.php?meal=snack";
}
function dinner()
{
    window.location = "../meals/new.php?meal=dinner";
}

</script>
</body>
</html>

<?php
}
else
	header("Location:../sessions/loginPage.php");																													?>