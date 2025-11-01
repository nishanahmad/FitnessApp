<?php

session_start();
if(isset($_SESSION["user_name"]))
{
	require '../connect.php';
	require '../navbar.php';
	
	$totalCalories = 0;
	$meals = mysqli_query($con, "SELECT * FROM meals WHERE date = CURDATE()") or die(mysqli_error($con));	
	foreach($meals as $meal)
	{
		$itemId = $meal['item'];
		$itemSql = mysqli_query($con, "SELECT * FROM items WHERE id = '$itemId'") or die(mysqli_error($con));	
		$item = mysqli_fetch_array($itemSql, MYSQLI_ASSOC);
		$totalCalories = $item['calories'] * $meal['qty']/ $item['qty'];
	}												?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calorie Friend</title>
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
      <div class="header-title"><i class="bi bi-egg-fried"></i> Calorie Friend</div>
      <div class="profile-img">
        <img src="https://via.placeholder.com/40" alt="Profile">
      </div>
    </div>

    <!-- Summary -->
    <div class="card-summary mb-3">
      <div class="row">
        <div class="col">
          <div class="big-number"><?php echo $totalCalories;?>/1800</div>
        </div>
      </div>
    </div>

    <!-- Macros -->
    <div class="macro-card mb-3">
      <div class="mb-2">Protein</div>
      <div class="progress mb-2">
        <div class="progress-bar bg-info" style="width: 33%"></div>
      </div>
      <div class="mb-2">Carbs</div>
      <div class="progress mb-2">
        <div class="progress-bar bg-warning" style="width: 50%"></div>
      </div>
      <div class="mb-2">Fats</div>
      <div class="progress">
        <div class="progress-bar bg-primary" style="width: 15%"></div>
      </div>
    </div>

    <!-- Meals -->
    <h6 class="fw-bold mb-3 text-center">Today</h6>
    <div class="meal-card">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-cup-hot"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Breakfast</div>
          <small class="text-muted">450 - 550 kcal</small>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>

    <div class="meal-card">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-egg"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Lunch</div>
          <small class="text-muted">650 - 750 kcal</small>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>

    <div class="meal-card">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-cookie"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Snack</div>
          <small class="text-muted">100 kcal</small>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>
    <div class="meal-card">
      <div class="d-flex align-items-center">
        <div class="meal-icon"><i class="bi bi-fork-knife"></i></div>
        <div class="ms-2">
          <div class="fw-bold">Dinner</div>
          <small class="text-muted">400 kcal</small>
        </div>
      </div>
      <div><i class="bi bi-plus-circle"></i></div>
    </div>
  </div>



</body>
</html>

<?php
}
else
	header("Location:sessions/loginPage.php");																													?>