<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "regex_db");
$data = $_POST;

if (isset($data['ubah'])) {
    $email = $_SESSION['email'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    $password_lama = $data['password_lama'];
    $password_baru = $data['password_baru'];

    if ($password_lama == $row['password']) {
        $query = mysqli_query($conn, "UPDATE users SET password='$password_baru' WHERE email='$email'");
        if ($query) {
            print('<script>alert("Password berhasil diubah!");</script>');
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

    <title>Ubah Password</title>
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
                                <label for="password_lama" class="form-label">Password Lama</label>
                                <input type="text" name="password_lama" class="form-control" id="password_lama" placeholder="" required />
                            </div>

                            <div class="col-12">
                                <label for="password_baru" class="col-form-label">Password Baru</label>
                            </div>

                            <div class="mb-3 row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" id="password_baru" name="password_baru" class="form-control" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" placeholder="Password" aria-describedby="passwordHelp" required>
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
                                <button class="btn btn-primary" name="ubah" id="ubah" type="submit">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const generate = document.getElementById("generate");
        const generated_pass = document.getElementById("password_baru");
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