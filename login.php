<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

$conn = mysqli_connect("localhost", "root", "", "regex_db");
$data = $_POST;

if (isset($data['login'])) {
  $email = mysqli_real_escape_string($conn, $data['email']);
  $password = mysqli_real_escape_string($conn, $data['password']);

  $cek_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'"));

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);

  if ($cek_email == 0) {
    print('<script>alert("Email tidak terdaftar! Silahkan registrasi terlebih dahulu.");</script>');
  } elseif ($row['password'] !== $password) {
    print('<script>alert("Password yang dimasukkan salah!");</script>');
  } else {
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['email'] = $row['email'];
    header("Location: index.php");
    exit;
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-7 col-lg-5">
        <div class="card shadow-lg">
          <div class="card-body">
            <h1 class="mb-5 mt-3 text-center text-primary">Login</h1>

            <form action="#" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email" required />
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" name="login" id="login" type="submit">Login</button>
              </div>

              <p class="text-center mt-4">Don't have an account? <a href="registrasi.php" class="text-decoration-none"> Sign Up Now</a>.</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>