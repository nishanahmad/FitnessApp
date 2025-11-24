<?php
	$flag = 'home';
	$url = $_SERVER['REQUEST_URI'];
	if (strpos($url, 'home') !== false)
		$flag = 'home';		
	if (strpos($url, 'meals') !== false)
		$flag = 'meals';		
	if (strpos($url, 'items') !== false)
		$flag = 'items';		
	if (strpos($url, 'weight') !== false)
		$flag = 'weight';		
?>  
  <!-- Bottom Navigation -->
  <style>
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
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">  
  </head>
  <div class="bottom-nav">
    <a <?php if($flag == 'home') echo 'href="#"'.' class="active"'; else if($flag == 'meals') echo 'href="../index.php"'.' class="active"'; else echo 'href="../index.php"'?>><i class="bi bi-house-door-fill"></i>Home</a>
    <a <?php if($flag == 'items') echo 'href="#"'.' class="active"'; else echo 'href="../items/new.php"'?>><i class="bi bi-plus-circle"></i>Item</a>
    <a <?php if($flag == 'weight') echo 'href="#"'.' class="active"'; else echo 'href="../weight/new.php"'?>><i class="bi bi-fire"></i>Weight</a>
    <a href="#"><i class="bi bi-card-checklist"></i>Plans</a>
  </div>