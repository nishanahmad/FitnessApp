<?php

session_start();
if(isset($_SESSION["user_name"]))
{																																																	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modern Calorie & Macros Tracker</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fdf8f4;
      font-family: 'Segoe UI', sans-serif;
    }
    .card-custom {
      border-radius: 20px;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      padding: 20px;
    }
    .progress {
      height: 6px;
      border-radius: 10px;
      background-color: #f1eae4;
    }
    .progress-bar {
      border-radius: 10px;
    }
    .activity-icon {
      background: #f6f0eb;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      margin-bottom: 5px;
    }
    .btn-cta {
      background: #f57c4a;
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 30px;
      padding: 12px;
      width: 100%;
      font-size: 16px;
    }
    .section-title {
      font-weight: 600;
      color: #3a2e27;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="container py-4" style="max-width: 450px;">
    <!-- Title -->
    <h4 class="text-center mb-4" style="color:#3a2e27; font-weight:700;">Here is your health plan</h4>

    <!-- Daily Nutritions -->
    <div class="card-custom mb-4">
      <h6 class="section-title">Daily nutritions</h6>
      <div class="mb-3">
        <div class="d-flex justify-content-between">
          <span>Calories</span><span>2000 kcal</span>
        </div>
        <div class="progress">
          <div class="progress-bar bg-success" style="width: 100%;"></div>
        </div>
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between">
          <span>Protein</span><span>35%</span>
        </div>
        <div class="progress">
          <div class="progress-bar bg-info" style="width: 35%;"></div>
        </div>
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between">
          <span>Carbs</span><span>50%</span>
        </div>
        <div class="progress">
          <div class="progress-bar bg-warning" style="width: 50%;"></div>
        </div>
      </div>
      <div>
        <div class="d-flex justify-content-between">
          <span>Fats</span><span>15%</span>
        </div>
        <div class="progress">
          <div class="progress-bar bg-purple" style="width: 15%; background-color: #8a56ac;"></div>
        </div>
      </div>
    </div>

    <!-- Suggested Activities -->
    <div class="card-custom mb-4">
      <h6 class="section-title">Suggested activities</h6>
      <div class="d-flex justify-content-around text-center">
        <div>
          <div class="activity-icon"><i class="bi bi-person-walking"></i></div>
          <small>Walking</small>
        </div>
        <div>
          <div class="activity-icon"><i class="bi bi-run"></i></div>
          <small>Running</small>
        </div>
        <div>
          <div class="activity-icon"><i class="bi bi-barbell"></i></div>
          <small>Workout</small>
        </div>
        <div>
          <div class="activity-icon"><i class="bi bi-yoga"></i></div>
          <small>Pilates</small>
        </div>
      </div>
    </div>

    <!-- CTA Button -->
    <button class="btn-cta">Get started</button>
  </div>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>																																					<?php
}
else
	header("Location:sessions/loginPage.php");																													?>