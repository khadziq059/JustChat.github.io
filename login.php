<?php
include("koneksi.php");
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    // Cek email
    if (mysqli_num_rows($user) === 1) {
        $row = mysqli_fetch_assoc($user);
        // Cek password
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['gambar']= $row['gambar'];
            if ($row['username'] == "admin" or $row['username'] == "owner") {
                $_SESSION["admin"] = true;
                header("Location: admin-index.php");
            } else if($row['username'] == "moderator"){
                header("Location: moderator-status.php");
            }else {
                header("Location: index.php");
            }
            exit;
        } else {
            // Tampilkan pesan kesalahan dengan JavaScript
            echo '<script type="text/javascript">
                    alert("Periksa kembali email dan password anda");
                    window.location = "login.php";
                  </script>';
        }
    } else {
        // Jika email tidak ditemukan
        // Tampilkan pesan kesalahan dengan JavaScript
        echo '<script type="text/javascript">
                alert("Email tidak ditemukan");
                window.location = "login.php";
              </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="eng">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="image/JC.ico" type="image/x-icon">
    <title>Login - JustChat</title>
  </head>
  <body>
  <nav class="navbar">
    <div class="container-fluid">
      <!-- Logo -->
      <p class="navbar-brand mb-0 h1 logo text-info">Just<span>Chat</span></p>
      <!-- Navbar items -->
      <ul class="nav" id="navbarList">
        <li class="nav-item">
          <a class="nav-link active mx-2" aria-current="page" href="register.php"><button class="btn btn-info">Sign up</button></a>
        </li>
      </ul>
    </div>
  </nav>
    <form action="" method="POST">
    <div class="login d-flex justify-content-center align-items-center ">
      <div class="container main">
        <div class="row border rounded-4 shadow box-area">
        <!-- login left -->
          <div class="col-md-4 d-flex justify-content-center align-items-center flex-column left-box">
            <img src="image/login.jpg" alt="login image" class="img-fluid">
          </div>
          <!-- login right -->
          <div class="col-md-8 rounded-start-4 right-box" style="background-color: #64ccc5">
            <div class="content mx-5">
              <p>Welcome Back!</p>
              <small>Login to your account</small></p>
                <?php if(isset($error)) : ?>
                    <p><small>Incorrect Email/password</small></p>
                <?php endif; ?>
              <form action="" method="post">
              <label for="email" class="form-label mt-2 mb-1">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"/>

              <label for="password" class="form-label mt-2 mb-1">Password</label>
              <div class="group-input">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"/>
                <img id="passwordIcon" src="image/eye-solid.svg" alt="show" onclick="togglePassword()"/>
              </div>
              <div class="bottom-container">
                <button class="next btn btn-outline-dark mt-3" name="login">Next</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </form>

    <script>
      function togglePassword() {
        const passwordField = document.getElementById("password");
        const passwordIcon = document.getElementById("passwordIcon");

        if (passwordField.type === "password") {
          passwordField.type = "text";
          passwordIcon.src = "image/eye-slash-solid.svg";
        } else {
          passwordField.type = "password";
          passwordIcon.src = "image/eye-solid.svg";
        }
      }
    </script>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
