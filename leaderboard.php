<?php
$conn = mysqli_connect("localhost", "root", "", "ctflab");
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: App/login.php");
}
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
                    <a href="exercise.php"><i class="fa-solid fa-gamepad"></i><span class="side-link"> Exercise Lab</span></a>
                </div>
            </div>
        </div>
        <a href="" class="active"><i class="fa-solid fa-ranking-star"></i> <span class="side-link">Rankings</span></a>
        <a href=""><i class="fa-solid fa-book"></i> <span class="side-link">Academy</span></a>
        <button class="slide-close" id="slideClose"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </div>
    <section id="banner">
        <div class="banner">
            <div class="container">
                <div class="row">

                    <div class="border-container">
                        <center>
                            <img src="assets/img/isci.png" style="width: 200px;" alt="">
                            <h1 style="font-weight: bolder; font-size: 30px; color: aqua;" class="text-center">CTF Leaderboard</h1>
                            <div style="height: 2px; width: 5em; background-color: white;"></div>
                        </center>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ranking = 1;
                                $tampil = mysqli_query($conn, "SELECT * FROM user ORDER BY point DESC");
                                while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $ranking ?></th>
                                        <th><?= $data["nama"] ?></th>
                                        <th><?= $data["point"] ?></th>
                                        <?php $ranking++; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
                <br>
            </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- My JS -->
    <script src="assets/js/script.js"></script>
</body>

</html>