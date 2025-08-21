<?php
session_start();
include 'koneksi.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM accounts WHERE username = ? AND password = ?";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $_SESSION['is_logged_in'] = true;
    header('Location: index.php');
    exit;
  } else {
    $message = 'Username atau password salah, silakan coba lagi.';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .login-form {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="bg-light">
  <div class="container">
    <div class="login-form">
      <h2 class="text-center mb-4">Login</h2>
      <?php if (!empty($message)): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $message; ?>
        </div>
      <?php endif; ?>
      <form action="login.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
      <div class="mt-3 text-center">
        Belum punya akun? <a href="signup.php">Daftar di sini</a>
      </div>
    </div>
  </div>
</body>

</html>