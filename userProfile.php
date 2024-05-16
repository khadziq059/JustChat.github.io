<?php
    include("koneksi.php");
    session_start();
    /*$pengirim = $_SESSION['username'];
    $sql="SELECT * FROM users WHERE username='$pengirim'";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $gambar=$row['gambar'];
        $email=$row['email'];
    }*/

    $penerima=$_GET['penerima'];
    //echo $penerima;
    $sql="SELECT * FROM users WHERE username='$penerima'";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $gambar=$row['gambar'];
        $email=$row['email'];
    }



?>


<!DOCTYPE html>
<html lang="eng">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/userProfile.css" />

    <!-- Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <link rel="icon" href="image/JC.ico" type="image/x-icon">
    <title>Profile - JustChat</title>
  </head>
  <body>
    <!-- Navbar -->
    <div class="row nav sticky-top m-auto">
      <div class="col-1 d-flex">
      <a href="index.php"><i class="fa-solid fa-xmark mt-1"></i></a>
      </div>
      <div class="col-11 d-flex">
        <p class="mb-0">Info Kontak</p>
      </div>
    </div>
    <!-- Navbar end -->
    <div class="update container bg-body-tertiary overflow-hidden">
      <!-- info kontak -->
      <div class="container update-profile">
        <div class="row">
            <div class="edit-profile d-flex justify-content-center card bg-body-tertiary shadow-sm align-center mx-auto">
            <h6 class="mt-3 mb-0"><i class="fas fa-user"></i> User Profile</h6>
            <hr />
            <form
              action="update_profile.php"
              method="POST"
              enctype="multipart/form-data"
            >
              <div class="photo d-grid justify-content-center text-center mx-5">
                <label for="photo"
                  ><img src="image/<?php echo $gambar; ?>" alt="profil"
                /></label>
              </div>
              <div class="text text-center mt-3"><?php echo $email; ?></div>
              <div class="text text-center mt-3 mb-4"><?php echo $penerima; ?>
            </form>
      </div>
      <!-- info kontak end -->

      <?php
                // Proses form ketika tombol submit ditekan
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Cek aksi yang dipilih oleh pengguna
                    if (isset($_POST['hapus_akun'])) {
                        // Lakukan aksi hapus akun
                        // ...
                        echo "Akun berhasil dihapus.";
                    } else if (isset($_POST['ganti_password'])) {
                        header("Location: ganti_password.php");
                        // Lakukan aksi ganti password
                        // ...
                        echo "Password berhasil diubah.";
                    }
                }
            ?>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>