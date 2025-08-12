<?php

session_start();
if(isset($_SESSION["user_name"]))
{																																																	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calorie Friend</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
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
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: #fff;
      display: flex;
      justify-content: space-around;
      padding: 0.5rem 0;
      box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
    }
    .bottom-nav a {
      text-decoration: none;
      color: #666;
      font-size: 0.8rem;
      text-align: center;
    }
    .bottom-nav a.active {
      color: #f26b3a;
    }
    .bottom-nav i {
      display: block;
      font-size: 1.2rem;
    }
    .container-custom {
      padding-bottom: 4rem; /* space for bottom nav */
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
          <div>200</div>
          <small>kcal eaten</small>
        </div>
        <div class="col">
          <div class="big-number">1800</div>
          <small>kcal goal</small>
        </div>
        <div class="col">
          <div>80</div>
          <small>kcal burned</small>
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

  <!-- Bottom Navigation -->
  <div class="bottom-nav">
    <a href="#" class="active"><i class="bi bi-house-door-fill"></i>Home</a>
    <a href="#"><i class="bi bi-plus-circle"></i>Add</a>
    <a href="#"><i class="bi bi-book"></i>Recipes</a>
    <a href="#"><i class="bi bi-card-checklist"></i>Plans</a>
  </div>

</body>
</html>

<?php
}
else
	header("Location:sessions/loginPage.php");																													?>