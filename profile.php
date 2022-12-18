<?php
$conn = mysqli_connect("localhost", "root", "", "ctflab");
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: App/login.php");
}
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
    <a href="" class="active"><i class="fa-solid fa-user"></i> <span class="side-link">My Profile</span></a>
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
    <a href="leaderboard.php"><i class="fa-solid fa-ranking-star"></i> <span class="side-link">Rankings</span></a>
    <a href=""><i class="fa-solid fa-book"></i> <span class="side-link">Academy</span></a>
    <button class="slide-close" id="slideClose"><i class="fa-solid fa-arrow-right"></i></button>
  </div>
  </div>
  <section id="banner">
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <br>
            <div class="border-container">
              <?php
              if (isset($_POST["update"])) {
                $id = $_POST["id"];
                $nama = $_POST["nama"];
                $kota = $_POST["kota"];
                $email = $_POST["email"];
                $nomorhp = $_POST["nomorhp"];
                $password = $_POST["password"];
                $password2 = $_POST["password2"];

                if ($password != $password2) {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Konfirmasi password tidak cocok, silahkan cek password anda terlebih dahulu!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                } else {
                  $query = mysqli_query($conn, "UPDATE user SET nama = '$nama', kota = '$kota', email = '$email', nomorhp = '$nomorhp', password = '$password2' WHERE id = '$id'");
                  if ($query) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data berhasil diperbarui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                  }
                }
              }
              function hapus($id)
              {
                global $conn;
                mysqli_query($conn, "DELETE FROM user WHERE id = $id");
                return mysqli_affected_rows($conn);
              }
              if (isset($_POST["delete"])) {
                if (hapus($id) > 0) {
                  echo "
                      <script>
                        alert('Akun berhasil dihapus!');
                        document.location.href = 'App/login.php'
                      </script>   
                      ";
                } else {
                  echo "
                      <script>
                        alert('postingan gagal dihapus');
                      </script>   
                      ";
                }
              }
              ?>
              <p style="font-weight: bolder; font-size: 25px; color: white;">My Profile</p>
              <div class="" style="height: 2px; width: 10em; background-color: rgb(63, 63, 63);"></div>
              <br>
              <img src="assets/img/isci.png" alt="" style="width: 150px; margin-bottom: 20px;">
              <input type="file" id="avatar" name="gambar" id="" class="form-control">
              <br>
              <br>
              <form class="row g-3" method="POST" action="">
                <input type="hidden" name="id" value="<?= $data["id"] ?>">
                <div class="col-auto input-prf">
                  <span class="label">Username</span>
                  <input type="text" name="nama" class="form-control" placeholder="Username" value="<?= $data["nama"] ?>">
                </div>
                <div class="col-auto input-prf">
                  <span class="label">Country</span>
                  <input type="text" name="kota" class="form-control" placeholder="Country" value="<?= $data["kota"] ?>">
                </div>
                <div class="col-auto input-prf">
                  <span class="label">Email</span>
                  <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $data["email"] ?>">
                </div>
                <div class="col-auto input-prf">
                  <span class="label">Phone Number</span>
                  <input type="text" name="nomorhp" class="form-control" placeholder="Phone Number" value="<?= $data["nomorhp"] ?>">
                </div>
                <div class="col-auto input-prf">
                  <span class="label">Password</span>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-auto input-prf">
                  <span class="label">Confirm Password</span>
                  <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="col-auto">
                  <button class="upload" name="update"><i class="fa-solid fa-upload"></i> SAVE CHANGES</button>
                </div>

            </div>
          </div>

          <div class="col-md-6">
            <br>
            <div class="border-container">
              <p style="font-weight: bolder; font-size: 25px; color: white;">Delete Account</p>
              <p style="color: #747474;">By clicking the button your account details will be filled with dummy data and you will permanently lose access to your
                account.</p>
              <button name="delete" class="delete-account">DELETE ACCOUNT</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
    </div>
    </div>
  </section>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- My JS -->
  <script src="assets/js/script.js"></script>
</body>

</html>