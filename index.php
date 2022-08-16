<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$conn = mysqli_connect("localhost", "root", "", "regex_db");

$row = $_SESSION['nama'];
$nama = strtoupper($row);
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Welcome!</title>
</head>

<body>
  <div class="px-4 py-5 my-5 text-center">

    <h1 class="display-5 fw-bold">WELCOME, <?= $nama ?>!</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"></p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="ubah_password.php" id="ubah_password" class="btn btn-primary btn-lg px-4 gap-3">Ubah Password</a>
        <a href="logout.php" id="logout" class="btn btn-outline-danger btn-lg px-4">Logout</a>
      </div>
    </div>
  </div>
</body>

</html>