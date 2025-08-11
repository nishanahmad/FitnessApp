<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calorie Friend - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .bg-image {
      background: url('your-image.jpg') no-repeat center center/cover;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      position: relative;
    }
    .bg-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.4);
    }
    .content {
      position: relative;
      z-index: 2;
      padding: 20px;
      width: 100%;
      max-width: 350px;
    }
    .btn-login {
      background-color: #2c7a63;
      color: white;
      border-radius: 25px;
      padding: 10px 30px;
      font-size: 1rem;
    }
    .btn-login:hover {
      background-color: #256c56;
      color: white;
    }
    .login-text a {
      color: #d1d1d1;
      text-decoration: none;
    }
    .login-text a:hover {
      text-decoration: underline;
    }
    .form-control {
      border-radius: 20px;
      padding: 10px;
    }
  </style>
</head>
<body>

<div class="bg-image">
  <div class="bg-overlay"></div>
  <div class="content">
    <div class="mb-3">
      <i class="bi bi-egg-fried" style="font-size:2rem;"></i>
    </div>
    <h2 class="fw-bold">Calorie Friend</h2>
    <p class="mb-4">Your way to healthier you</p>

    <!-- Username field -->
    <input type="text" class="form-control mb-3" placeholder="Username" required>

    <!-- Password field -->
    <input type="password" class="form-control mb-3" placeholder="Password" required>

    <!-- Login button -->
    <button class="btn btn-login w-100 mb-3">Login</button>

    <p class="login-text">Don't have an account? <a href="#">Sign up</a>.</p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
