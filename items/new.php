<?php
require '../connect.php';
require '../navbar.php';

ini_set('session.gc_maxlifetime', 14400);
ini_set('session.cookie_lifetime', 14400);

session_start();
if(isset($_SESSION["user_name"]))
{																																									?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="UTF-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <title>Add Meal</title>
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
		<h4 class="text-center mb-4" style="color:#3a2e27; font-weight:700;">Add an Item</h4>

		<!-- Item Form -->
		<form name="newMealForm" id="newMealForm" method="post" action="insert.php">
			<div class="card-custom mb-4">
			  <div class="mb-3">
				<label class="form-label fw-semibold">Name</label>
				<input type="text" name="name" required class="form-control" placeholder="Enter name">
			  </div>
			  
			  <div class="mb-3">
				<label class="form-label fw-semibold">Brand</label>
				<input type="text" name="brand" class="form-control" placeholder="Enter brand">
			  </div>	  

			  <div class="mb-3">
				<label class="form-label fw-semibold">Qty</label>
				<input type="number" name="qty" required class="form-control" placeholder="Enter qty">
			  </div>
			  
			  <div class="mb-3">
				<label class="form-label fw-semibold">Unit</label>
				<input type="text" name="unit" required class="form-control" placeholder="Enter unit">
			  </div>	  	  
			  
			  <div class="mb-3">
				<label class="form-label fw-semibold">Calories (kcal)</label>
				<input type="number" name="calories" required class="form-control" placeholder="Enter calories">
			  </div>

			  <div class="mb-3">
				<label class="form-label fw-semibold">Protein (g)</label>
				<input type="number" step="0.01" min="0" max="100" name="protein" class="form-control" placeholder="Enter protein">
			  </div>

			  <div class="mb-3">
				<label class="form-label fw-semibold">Carb (g)</label>
				<input type="number" step="0.01" min="0" max="100" name="carb" class="form-control" placeholder="Enter carb">
			  </div>

			  <div class="mb-3">
				<label class="form-label fw-semibold">Fat (g)</label>
				<input type="number" step="0.01" min="0" max="100" name="fat" class="form-control" placeholder="Enter fat">
			  </div>
			  
			  <div class="mb-3">
				<label class="form-label fw-semibold">Fibre (g)</label>
				<input type="number" step="0.01" min="0" max="100" name="fibre" class="form-control" placeholder="Enter fibre">
			  </div>

			  <div class="mb-3">
				<label class="form-label fw-semibold">Sugar (g)</label>
				<input type="number" step="0.01" min="0" max="100" name="sugar" class="form-control" placeholder="Enter sugar">
			  </div>	  
			</div>

			<!-- Save Button -->
			<button class="btn-cta">Save Item</button>
			<br/><br/><br/><br/>
		</form>
	  </div>

	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
	</html><?php
}
else
	header("Location:../sessions/loginPage.php");																													?>