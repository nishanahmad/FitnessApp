<?php
require '../connect.php';
require '../navbar.php';

$items = mysqli_query($con, "SELECT * FROM items") or die(mysqli_error($con));		
?>
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
    <h4 class="text-center mb-4" style="color:#3a2e27; font-weight:700;">Add a Meal</h4>

    <!-- Meal Form -->
	<form name="newMealForm" id="newMealForm" method="post" action="insert.php">
		<div class="card-custom mb-4">
		  <div class="mb-3">
			<label class="form-label fw-semibold">Meal Type</label>
			<select name="type" class="form-select">
			  <option selected>Breakfast</option>
			  <option>Lunch</option>
			  <option>Dinner</option>
			  <option>Snack</option>
			</select>
		  </div>

		  <div class="mb-3">
			<label class="form-label fw-semibold">Item</label>
			<select name="item" class="form-select">
				<option value="">----- Select -----</option><?php
				foreach($items as $item) 
				{																																		?>
					<option value="<?php echo $item['id'];?>"><?php echo $item['name'].' '.$item['brand'].'  ('.$item['unit'].')';?></option>														<?php	
				}																																		?>
			</select>
		  </div>

		  <div class="mb-3">
			<label class="form-label fw-semibold">Qty (g)</label>
			<input type="number" step="0.01" min="0" max="1000" name="qty" class="form-control" placeholder="Enter qty">
		  </div>
		</div>
		<!-- Live Preview -->
		<div class="preview-card mb-4">
		  <h6 class="fw-semibold">Meal Preview</h6>
		  <p class="mb-1">Calories: <span class="fw-bold">0</span> kcal</p>
		  <p class="mb-1">Protein: <span class="fw-bold">0</span> g</p>
		  <p class="mb-1">Sugar: <span class="fw-bold">0</span> g</p>
		  <p class="mb-1">Fibre: <span class="fw-bold">0</span> g</p>
		  <p class="mb-1">Carbs: <span class="fw-bold">0</span> g</p>
		  <p class="mb-0">Fats: <span class="fw-bold">0</span> g</p>
		</div>

		<!-- Save Button -->
		<button type="submit" class="btn-cta">Save Meal</button>
	</form>	
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
