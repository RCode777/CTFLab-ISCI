<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISCI CTFLab - Login</title>
    <link rel="shortcut icon" href="../assets/img/isci.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/716ee26491.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>




    <main class="form-signin w-100 m-auto">
        <form method="post" action="">
            <center>
                <img class="mb-4" src="../assets/img/isci.png" alt="" width="150">
                <h1 class="h3 mb-3 fw-normal text-center" style="color: aqua;">Please Sign In</h1>
                <div style="width: 5em; height: 2px; background-color: white;"></div>
            </center>
            <br>
            <?php
            require "../adminCTF/connection.php";

            if (isset($_POST["submit"])) {
                $email = $_POST["nama"];
                $password = $_POST["password"];

                $query = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' OR nama = '$email' AND password = '$password' "));
                if ($query) {
                    $_SESSION["login"] = $query["id"];
                    header("Location: ../index.php");
                    exit;
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Email atau password anda salah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                }
            }

            ?>
            <div class="form-floating">
                <input type="email" name="nama" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
            <br>
            <br>
            <p class="text-center text-white">Don't have account?<a href="register.php"> Sign Up</a></p>
        </form>
    </main>
    <br>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
</body>

</html>