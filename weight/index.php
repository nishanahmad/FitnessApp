<?php
ini_set('session.gc_maxlifetime', 14400);
ini_set('session.cookie_lifetime', 14400);

session_start();
if(isset($_SESSION["user_name"]))
{
	require '../connect.php';
	require '../navbar.php';
	
	$userId = $_SESSION["user_id"];
	$logMap = array();
	$logs = mysqli_query($con, "SELECT * FROM weight_log WHERE user = $userId ORDER BY entered_on DESC LIMIT 19") or die(mysqli_error($con));
	foreach($logs as $log)
	{
		$logMap[date('dM',strtotime($log['entered_on']))] = $log['weight'];
	}	
	$logMap = array_reverse($logMap);
	
	$startWeight = $logMap[array_key_first($logMap)];
	$currentWeight = $logMap[array_key_last($logMap)];
	$change = $currentWeight - $startWeight;
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Weight Progress</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      background-color: #fdf8f4;
      font-family: 'Segoe UI', sans-serif;
    }

    .card-custom {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      padding: 20px;
    }

    .stat-pill {
      background: #f6f0eb;
      border-radius: 12px;
      padding: 10px;
      text-align: center;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="container py-4" style="max-width: 450px;">

    <!-- Page Title -->
    <h4 class="text-center mb-4 fw-bold" style="color:#3a2e27;">
      Weight Progress
    </h4>

    <!-- Summary Stats -->
    <div class="row g-2 mb-4">
      <div class="col-4">
        <div class="stat-pill">
          <div class="small text-muted">Start</div>
          <div><?php echo $startWeight;?> kg</div>
        </div>
      </div>
      <div class="col-4">
        <div class="stat-pill">
          <div class="small text-muted">Current</div>
          <div><?php echo $currentWeight;?> kg</div>
        </div>
      </div>
      <div class="col-4">
        <div class="stat-pill">
          <div class="small text-muted">Change</div>
          <div class="<?php if($change > 0) echo "text-danger"; else echo "text-success";?>"><?php echo $currentWeight - $startWeight;?></div>
        </div>
      </div>
    </div>

    <!-- Chart Card -->
    <div class="card-custom">
      <h6 class="fw-semibold mb-3">Last 14 Days</h6>
      <canvas id="weightChart" height="220"></canvas>
    </div>

  </div>

  <script>
    const ctx = document.getElementById('weightChart').getContext('2d');

  const weightData = <?= json_encode($logMap); ?>;

  const labels = Object.keys(weightData);
  const values = Object.values(weightData);

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Weight (kg)',
          data: values,
          borderColor: '#f57c4a',
          backgroundColor: 'rgba(245, 124, 74, 0.15)',
          fill: true,
          tension: 0.4,
          pointRadius: 4,
          pointBackgroundColor: '#f57c4a'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            }
          },
          y: {
            grid: {
              color: '#f1eae4'
            },
            ticks: {
              callback: value => value + ' kg'
            }
          }
        }
      }
    });
  </script>

</body>
</html>

<?php
}
else
	header("Location:../sessions/loginPage.php");																													?>
