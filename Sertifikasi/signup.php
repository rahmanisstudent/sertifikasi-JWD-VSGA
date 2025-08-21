<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .signup-form {
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
    <div class="signup-form">
      <h2 class="text-center mb-4">Daftar Akun Baru</h2>
      <?php
      // Menampilkan pesan sukses atau error dari proses_signup.php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
          echo '<div class="alert alert-success" role="alert">Pendaftaran berhasil! Silakan login.</div>';
        } elseif ($_GET['status'] == 'error') {
          echo '<div class="alert alert-danger" role="alert">Pendaftaran gagal, coba lagi.</div>';
        } elseif ($_GET['status'] == 'exist') {
          echo '<div class="alert alert-warning" role="alert">Username sudah ada, gunakan username lain.</div>';
        }
      }
      ?>
      <form action="proses_signup.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-success">Daftar</button>
        </div>
      </form>
      <div class="mt-3 text-center">
        Sudah punya akun? <a href="login.php">Login di sini</a>
      </div>
    </div>
  </div>
</body>

</html>