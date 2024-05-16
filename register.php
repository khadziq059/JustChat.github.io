<?php
include("koneksi.php");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $gambar="default.png";

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error_message = "Username telah digunakan pengguna lain, silakan gunakan username lainnya";
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $error_message = "Email telah terdaftar, silakan gunakan email lainnya";
        } else {
            if ($password !== $password2) {
                $error_message = "Periksa kembali password Anda";
            } else {
                // Hash the password before storing it in the database (you should use a proper hashing method)
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (username, email, password, gambar) VALUES ('$username', '$email', '$hashed_password', '$gambar')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: login.php");
                    exit;
                } else {
                    $error_message = "Terjadi kesalahan saat membuat akun: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous"/>
    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
          rel="stylesheet"/>

    <link rel="stylesheet" href="css/signup.css" />
    <link rel="icon" href="image/JC.ico" type="image/x-icon">
    <title>Sign Up - JustChat</title>
</head>
<body>
<nav class="navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <p class="navbar-brand mb-0 h1 logo text-info">Just<span>Chat</span></p>
        <!-- Navbar items -->
        <ul class="nav" id="navbarList">
            <li class="nav-item">
                <a class="nav-link active mx-2" aria-current="page" href="login.php"><button class="btn btn-info">Login</button></a>
            </li>
        </ul>
    </div>
    </nav>
<div class="login d-flex justify-content-center align-items-center min-vh-100">
    <div class="container main">
        <div class="row border rounded-4 box-area">
            <!-- login left -->
            <div class="col-md-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image">
                    <img src="image/login.jpg" alt="login" class="img-fluid">
                </div>
            </div>
            <!-- login right -->
            <div class="col-md-8 rounded-start-4 right-box" style="background-color: #64ccc5">
                <div class="content mx-5 my-4">
                    <p class="m-0">Welcome to JustChat!</p>
                    <p><small>Create a free account in 2 steps</small></p>
                    <form action="" method="POST">
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <label for="username" class="form-label mb-1">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Enter your username"/>
                        <label for="email" class="form-label mt-2 mb-1">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="Enter your username"/>

                        <label for="password" class="form-label mt-2 mb-1">Password</label>
                        <div class="group-input">
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Enter your password"/>
                            <img id="passwordIcon" src="image/eye-solid.svg" alt="show" onclick="togglePassword()"/>
                        </div>
                        <label for="password2" class="form-label mt-2 mb-1">Confirm Password</label>
                        <div class="group-input">
                            <input type="password" name="password2" class="form-control" id="password2"
                                   placeholder="Confirm your password"/>
                            <img id="passwordIcon2" src="image/eye-solid.svg" alt="show" onclick="togglePassword2()"/>
                        </div>
                        <button type="submit" name="register" class="btn btn-outline-dark mt-3">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
      function togglePassword2() {
        const passwordField2 = document.getElementById("password2");
        const passwordIcon2 = document.getElementById("passwordIcon2");

        if (passwordField2.type === "password") {
          passwordField2.type = "text";
          passwordIcon2.src = "image/eye-slash-solid.svg";
        } else {
          passwordField2.type = "password";
          passwordIcon2.src = "image/eye-solid.svg";
        }
      }
    </script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
