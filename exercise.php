<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: App/login.php");
}
require "adminCTF/connection.php";
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[login]'"));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISCI Team - CTFLab</title>
    <link rel="shortcut icon" href="assets/img/isci.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://kit.fontawesome.com/716ee26491.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless@5/borderless.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/isci.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-top">
                ISCI Team
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">View Profile</a>
                    <a class="nav-link" href="#">Profile Setting</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <a href="index.php"><i class="fa-solid fa-laptop"></i> <span class="side-link">Home</span></a>
        <a href="profile.php"><i class="fa-solid fa-user"></i> <span class="side-link">My Profile</span></a>
        <br>
        <center>
            <div class="hr"></div>
        </center>
        <br>
        <div class="accordion-item">
            <a data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa-solid fa-server"></i> <span class="side-link">Labs</span>
            </a>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <a href="ctf/"><i class="fa-solid fa-flag"></i><span class="side-link"> CTFLab</span></a>
                    <a href="" class="active"><i class="fa-solid fa-gamepad"></i><span class="side-link"> Exercise Lab</span></a>
                </div>
            </div>
        </div>
        <a href="leaderboard.php"><i class="fa-solid fa-ranking-star"></i> <span class="side-link">Rankings</span></a>
        <a href=""><i class="fa-solid fa-book"></i> <span class="side-link">Academy</span></a>
        <button class="slide-close" id="slideClose"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>
    <section id="banner">
        <div class="container">
            <?php
            $tampil = mysqli_query($conn, "SELECT * FROM exercise");
            while ($hasil = mysqli_fetch_array($tampil)) {
            ?>
                <button type="button" class="btn btn-modal" data-bs-toggle="modal" data-bs-target="#modal<?= $hasil["id"] ?>">
                    <?= $hasil["judul"] ?>
                </button>

                <div class="modal fade" id="modal<?= $hasil["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $hasil["judul"] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><?= $hasil["deskripsi"] ?></p>
                                <p>Author : <?= $hasil["author"] ?></p>
                                <a href="<?= $hasil["path"] ?>"><?= $hasil["judul"] ?></a>
                                <br>
                                <br>
                                <?php
                                $data1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id='$_SESSION[login]'"));
                                ?>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $data1["id"] ?>">
                                    <input type="hidden" name="nama" value="<?= $data1["nama"] ?>">
                                    <input type="hidden" name="kota" value="<?= $data1["kota"] ?>">
                                    <input type="hidden" name="email" value="<?= $data1["email"] ?>">
                                    <input type="hidden" name="nomorhp" value="<?= $data1["nomorhp"] ?>">
                                    <input type="hidden" name="password" value="<?= $data1["password"] ?>">
                                    <input type="text" class="form-control" name="flag" placeholder="Flag : ISCI{flag}" autocomplete="off">
                                    <br>
                                    <button name="btnflag" class="btn-flag">Submit Flag</button>
                                </form>
                                <?php
                                if (isset($_POST["btnflag"])) {
                                    $id = $_POST["id"];
                                    $flag = $_POST["flag"];
                                    mysqli_query($conn, "UPDATE user SET point = point + 10 WHERE id = '$id'");
                                    $query = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM exercise WHERE flag = '$flag'"));
                                    if ($query) {
                                        echo '<script>
                                        const Toast = Swal.mixin({
                                                    toast: true,
                                                    position: `top-end`,
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                    didOpen: (toast) => {
                                                        toast.addEventListener(`mouseenter`, Swal.stopTimer)
                                                        toast.addEventListener(`mouseleave`, Swal.resumeTimer)
                                                    }
                                                    })
                                                    Toast.fire({
                                                    icon: `success`,
                                                    title: `Flag kamu benar!`
                                                    })
                                                    </script>';
                                    } else {
                                        echo '<script>
                                        const Toast = Swal.mixin({
                                                    toast: true,
                                                    position: `top-end`,
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                    didOpen: (toast) => {
                                                        toast.addEventListener(`mouseenter`, Swal.stopTimer)
                                                        toast.addEventListener(`mouseleave`, Swal.resumeTimer)
                                                    }
                                                    })
                                                    Toast.fire({
                                                    icon: `error`,
                                                    title: `Flag kamu salah nih`
                                                    })
                                                    </script>';
                                    }
                                }

                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </section>


    <script>
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
</body>

</html>