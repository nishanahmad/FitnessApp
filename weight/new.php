<?php
require '../connect.php';
require '../navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log Weight</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
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
    .form-select, .form-control {
      border-radius: 12px;
      padding: 10px;
    }
    .preview-card {
      background: #f6f0eb;
      border-radius: 12px;
      padding: 15px;
    }
  </style>
</head>
<body>

  <div class="container py-4" style="max-width: 450px;">
    <!-- Title -->
    <h4 class="text-center mb-4" style="color:#3a2e27; font-weight:700;">Log Weight</h4>

    <!-- Meal Form -->
	<form name="newWeightForm" id="newWeightForm" method="post" action="insert.php">
		<div class="card-custom mb-4">
		  <div class="mb-3">
			<label class="form-label fw-semibold">Weight</label>
			<input type="number" step="0.01" min="0" max="1000" name="weight" class="form-control" placeholder="Enter Weight">
		  </div>
		</div>
		<button type="submit" class="btn-cta">Log</button>
	</form>	
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
