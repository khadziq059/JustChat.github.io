<?php
    include("koneksi.php");
    session_start();
    date_default_timezone_set('Asia/Jakarta');
    $username=$_SESSION['username'];
    $sql="SELECT * FROM users WHERE username='$username'";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $gambar=$row['gambar'];
        $email=$row['email'];
    }

    if(isset($_POST['submit'])){
        $status=$_POST['tweet'];
        $tanggal=date("Y-m-d H:i:s");
        $foto = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp, 'image/'. $foto);
        $sql="INSERT INTO status(username, isi, tanggal, foto) VALUES('$username', '$status', '$tanggal', '$foto')";
        $result=mysqli_query($conn, $sql);
        header("location: status.php");
    }
?>

<!doctype html>
<html lang="eng">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="stylesheet" href="css/status.css">

    <!-- Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" href="image/JC.ico" type="image/x-icon">
    <title>Status - JustChat</title>
  </head>
  <body>
    <!-- Navbar whatsapp -->
    <div class="nav row sticky-top m-auto">
        <div class="profil col-1 me-3">
            <a href="index.php" title="Back"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="name col-8 d-flex justify-content-start">
            <p class="nav-name mt-3">Status</p>
        </div>
        <div class="dropdown col-2 d-flex justify-content-end ms-3">
            <button class="btn dropdown-toggle" title="Menu" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
        </div>
    </div>
    <!-- Navbar end -->
    <div class="status container min-vh-100">
        <!-- Header Tweeet -->
        <div class="row card shadow-sm mb-2">
            <form action="status.php" method="POST" enctype="multipart/form-data">
                <div class="row d-flex justify-content-between align-items-start">
                    <div class="kolom1 col-1 d-flex">
                        <a href="profile.php" title="Profile"><img src="image/<?php echo $gambar; ?>" alt="profile" class="mt-3" id="img"></a>
                    </div>
                    <div class="kolom2 col-10 d-flex mt-3">
                        <textarea class="form-control" name="tweet" rows="2" placeholder="What's happening?" required></textarea>
                    </div>
                    <div class="kolom3 col-1 d-flex">
                        <div class="row mt-3">
                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-paper-plane fs-6"></i></button>
                        </div>
                    </div>
                    <label for="image-input" class="custom-file-upload">
                        <img src="image/galeri.png" alt="input photo" class="foto"> <span id="file-name-container" class="ms-2"></span>
                    </label>
                    <input class="form-control me-2" type="file" name="image" id="image-input" style="display: none;" onchange="displayFileName()">
                </div>
            </form>
        </div>
        <!-- Tweet Header End -->

        <!-- Hasil tweet -->
            <?php
                $sql="SELECT * FROM status INNER JOIN users ON status.username = users.username ORDER BY status.id_status DESC";
                $result=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    $pembuat=$row['username'];
                    $tanggal=$row['tanggal'];
                    $isi=$row['isi'];

                    //$sql2="SELECT * FROM users WHERE username=$pembuat";
                    //$result2=mysqli_query($conn, $sql2);
                    //$row2=mysqli_fetch_array($result2);
                    $gambar2=$row['gambar'];
                    $email2=$row['email'];
                    $foto=$row['foto'];
                    if($foto==''){
                        echo "
                        <div class='tweet row shadow-sm rounded-4 mb-2'>
                            <div class='tweet-header d-flex mt-3'>
                                <img src='image/".$gambar2."' alt='Profile Picture' class='profile-picture' id='img'>
                                <div class='tweet-user d-flex mt-2'>
                                    <p class='name fw-semibold mx-2'>".$pembuat."</p>
                                    <p class='email opacity-75'>".$email2."</p>
                                </div>
                            </div>
                            <div class='tweet-body me-5'>
                                <span class='timestamp opacity-75'>".$tanggal."</span>
                                <p>".$isi."</p>
                            </div>
                        </div>
                    ";
                    }else{
                        echo "<div class='tweet row shadow-sm rounded-4 mb-2'>
                                <div class='tweet-header d-flex mt-3'>
                                    <img src='image/".$gambar2."' alt='Profile Picture' class='profile-picture' id='img'>
                                        <div class='tweet-user d-flex mt-2'>
                                            <p class='name fw-semibold mx-2'>".$pembuat."</p>
                                            <p class='email opacity-75'>".$email2."</p>
                                        </div>
                                </div>
                                <div class='tweet-body me-5 mb-4'>
                                    <span class='timestamp opacity-75'>".$tanggal."</span>
                                    <p>".$isi."</p>
                                    <div class='foto-status'>
                                        <img src='image/".$foto."' alt='foto'>
                                    </div>
                                </div>
                            </div>";
                    }
                }

            ?>
        <!-- End Hasil -->
        <br>
    </div>
    
    <script>
    function displayFileName() {
        const fileInput = document.getElementById("image-input");
        const fileNameContainer = document.getElementById("file-name-container");

        if (fileInput.files.length > 0) {
            fileNameContainer.textContent = fileInput.files[0].name;
        } else {
            fileNameInput.value = "Nama Dokumen";
            fileNameContainer.textContent = "";
        }
    }

      </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
