<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cek apakah username sudah ada di database
  $sql_check = "SELECT id FROM accounts WHERE username = ?";
  $stmt_check = $connect->prepare($sql_check);
  $stmt_check->bind_param("s", $username);
  $stmt_check->execute();
  $stmt_check->store_result();

  if ($stmt_check->num_rows > 0) {
    // Username sudah ada
    header('Location: signup.php?status=exist');
    exit;
  }

  // Hash password sebelum disimpan (penting untuk keamanan)
  // Untuk proyek sekolah, ini bisa diabaikan jika tidak terlalu dibutuhkan
  // Namun sangat disarankan
  // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Masukkan data ke database
  $sql_insert = "INSERT INTO accounts (username, password) VALUES (?, ?)";
  $stmt_insert = $connect->prepare($sql_insert);
  $stmt_insert->bind_param("ss", $username, $password);

  if ($stmt_insert->execute()) {
    // Pendaftaran berhasil
    header('Location: signup.php?status=success');
    exit;
  } else {
    // Pendaftaran gagal
    header('Location: signup.php?status=error');
    exit;
  }
}
?>