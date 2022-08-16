<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

$conn = mysqli_connect("localhost", "root", "", "regex_db");
$data = $_POST;

if (isset($data['submit'])) {
  $username = mysqli_real_escape_string($conn, $data['username']);
  $name = mysqli_real_escape_string($conn, $data['full_name']);
  $email = mysqli_real_escape_string($conn, $data['email']);
  $password = mysqli_real_escape_string($conn, $data['password']);

  $cek_username = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'"));
  $cek_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'"));

  if ($cek_username > 0) {
    print('<script>alert("Username ' . $username . ' sudah digunakan, silahkan pilih username lain.");</script>');
  } else {
    if ($cek_email > 0) {

      $saran_email_arr = explode("@", $email);
      $saran_email_1 = $saran_email_arr[0] . "1@" . $saran_email_arr[1];
      $saran_email_2 = $saran_email_arr[0] . "2@" . $saran_email_arr[1];
      $saran_email_3 = $saran_email_arr[0] . "3@" . $saran_email_arr[1];

      print('<script id="saran_email" >alert("Email ' . $email . ' sudah digunakan, silahkan pilih email lain. Saran Email: ' . $saran_email_1 . ', ' . $saran_email_2 . ', ' . $saran_email_3 . ' ");</script>');
    } else {
      if (mysqli_query($conn, "INSERT INTO users VALUES('', '$username','$name','$email','$password')")) {
        print('<script>alert("Akun Anda Berhasil Terdaftar! Silahkan Login!");</script>');
        header('Location: login.php');
      } else {
        print('<script>alert("Akun Gagal Terregistrasi!");</script>');
      }
    }
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

  <title>Registrasi</title>
</head>

<body>
  <div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-7 col-lg-5">
        <div class="card shadow-lg">
          <div class="card-body">
            <h1 class="mb-5 mt-3 text-center text-primary">Registrasi</h1>

            <form action="#" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" pattern="[A-Za-z0-9_]+" placeholder="Username" required />
              </div>


              <div class="mb-3">
                <label for="full_name" class="form-label">Nama Lengkap</label>
                <input type="text" name="full_name" class="form-control" id="full_name" pattern="[A-Za-z\s]+" placeholder="Nama Lengkap" required />
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="contoh.123@gmail.com" required />
              </div>

              <!-- <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        id="password" 
                        pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$"
                        placeholder="Password" />
                  </div> -->

              <div class="col-12">
                <label for="password" class="col-form-label">Password</label>
              </div>

              <div class="mb-3 row g-3 align-items-center">
                <div class="col-auto">
                  <input type="text" id="password" name="password" class="form-control" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" placeholder="Password" aria-describedby="passwordHelp" required>
                </div>
                <div class="col-auto">
                  <a href="#" id="generate" class="btn btn-primary">Generate</a>
                  <!-- <button class="btn btn-primary" id="generate" name="generate" type="button">Generate</button> -->
                  <span id="saran_password" class="form-text text-bold">

                  </span>
                </div>
                <div id="passwordHelp" class="form-text">Password harus berisi minimal 8 karakter dan mengandung huruf besar dan angka.</div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const generate = document.getElementById("generate");
    const generated_pass = document.getElementById("password");
    const regex = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$');
    const huruf_random = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    const angka_random = [8, 9, 10, 11, 12];

    generate.addEventListener("click", function(event) {
      let hasil = "";
      while (regex.test(hasil) == false) {
        hasil = "";
        const jumlah = Math.floor(Math.random() * (12 - 8 + 1)) + 8;

        for (let i = 0; i < jumlah; i++) {
          hasil += huruf_random.charAt(Math.floor(Math.random() * huruf_random.length));
        };
      }
      generated_pass.value = hasil;
    });
  </script>

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