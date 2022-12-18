<?php
session_start();
require "../adminCTF/connection.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISCI CTFLab - Register</title>
    <link rel="shortcut icon" href="../assets/img/isci.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/716ee26491.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <br>
    <br><br>
    <div class="register m-auto">
        <div class="container">
            <div class="border-container">
                <?php
                if (isset($_POST["register"])) {
                    $nama = $_POST["nama"];
                    $kota = $_POST["kota"];
                    $email = $_POST["email"];
                    $nomorhp = $_POST["nomorhp"];
                    $password = $_POST["password1"];
                    $password2 = $_POST["password2"];
                    $point = 0;

                    if (
                        $password != $password2
                    ) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Konfirmasi password tidak cocok, silahkan cek password anda terlebih dahulu!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                    } else {
                        $query = mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$kota', '$email', '$nomorhp', '$password', '$point')");
                        if ($query) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> User baru berhasil di tambah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                        }
                    }
                }
                ?>
                <center>
                    <h1 class="h3 mb-3 fw-normal" style="color: aqua;">Please Sign In</h1>
                    <div style="width: 5em; height: 2px; background-color: white;"></div>
                </center>

                <form action="" method="post">
                    <label for="nama">Username</label>
                    <input type="text" class="form-control" name="nama">
                    <br>
                    <label for="kota">Country</label>
                    <input type="text" class="form-control" name="kota">
                    <br>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                    <br>
                    <label for="nomorhp">Phone Number</label>
                    <input type="number" class="form-control" name="nomorhp">
                    <br>
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" name="password1">
                    <br>
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control" name="password2">
                    <br>
                    <button class="signup-btn" name="register">Sign Up</button>
                    <br>
                    <br>
                    <p class="text-center text-white">have an account?<a href="login.php"> Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
</body>

</html>