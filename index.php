<?php 
    session_start();
    include("koneksi.php");
    //$username = $_SESSION['username'];
?>
<?php
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }else{
        $username = $_SESSION['username'];
        $gambar = $_SESSION['gambar'];
        ?>
<!doctype html>
<html lang="eng">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <!-- Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Homepage - JustChat</title>
    <link rel="icon" href="image/JC.ico" type="image/x-icon">
  </head>
  <body>
    <!-- Navbar whatsapp -->
    <div class="nav row sticky-top m-auto">
        <div class="profil col-1 me-3">
            <a href="profile.php" title="Profile">
                <img src="image/<?php echo $gambar ?>" alt="profile" class="profile-image">
            </a>
        </div>
        <div class="name col-5 d-flex justify-content-start">
            <p class="nav-name mt-3"><?php echo $username; ?></p>
        </div>
        <div class="status col-2 d-flex justify-content-end">
            <a href="status.php" title="Status"><i class="fa-solid fa-earth-americas"></i></a>
        </div>
        <div class="dropdown col-2 d-flex justify-content-end ms-3">
            <button class="btn dropdown-toggle" title="Menu" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                <li>
                    <button type="button" class="btn dropdown-item my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Help
                    </button>
                </li>
                <li>
                    <a class="dropdown-item my-2" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">How to Use</h1>
                    </div>
                    <div class="modal-body">
                    <div id="carouselExampleCaptions" class="carousel slide w-100 m-auto" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Homepage</h4><br>
                                <img src="image/index.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Select option 1 to navigate to the chat room</li>
                                    <li>Select option 2 to switch to the status page</li>
                                    <li>Select option 3 to open the dropdown menu</li>
                                    <li>Select option 4 to access your personal profile</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Change Password</h4><br>
                                <img src="image/cp.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Click on option 1 to enter your old password</li>
                                    <li>Click on option 2 to enter your new password</li>
                                    <li>Select option 3 if you want to save the changes</li>
                                    <li>Select option 4 if you want to close "Change Password"</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Setting Account</h4><br>
                                <img src="image/pengaturan.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Select option 1 to change your password</li>
                                    <li>Select option 2 to delete your account</li>
                                    <li>Select option 3 if you want to log out</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Change Username</h4><br>
                                <img src="image/cn.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Click on option 1 to enter a new username</li>
                                    <li>Click on option 2 to save the changes</li>
                                    <li>Click on option 3 if you want to close "Change Username"</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Profile</h4><br>
                                <img src="image/profile.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Click on option 1 to change your profile picture</li>
                                    <li>Click on option 2 to save the changes to your profile picture</li>
                                    <li>Select option 3 if you want to change your username</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Status</h4><br>
                                <img src="image/status.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Click on option 1 to enter your status</li>
                                    <li>Click on option 2 if you want to add an image to your status</li>
                                    <li>Click on option 3 to send your status</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Room Chat</h4><br>
                                <img src="image/chat.jpeg" class="d-block w-100" alt="..."><br>
                                <ol>
                                    <li>Click on option 1 to enter a message</li>
                                    <li>Click on option 2 if you want to send an image</li>
                                    <li>Click on option 3 to send a message</li>
                                    <li>Click on option 4 to go back to the Homepage</li>
                                    <li>Click on option 5 to view user profile</li>
                                    <li>Click on option 6 to open the dropdown</li>
                                </ol>
                            </div>
                            <div class="carousel-item"  data-bs-interval="10000">
                                <h4 class='text-center mb-2 justify-content-center'>Dropdown</h4><br>
                                <img src="image/dropdown.jpeg" class="d-block w-100" alt="..."><br>
                                <ol class='text-justify'>
                                    <li>Select option 1 if you want to view the application guide</li>
                                    <li>Select option 2 to log out of your account</li>
                                </ol>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Navbar end -->
    <div class="index container-fluid bg-body-tertiary min-vh-100">
        <!-- Chat list -->
            <div class="row chat min-vh-100">
                <div class="container2 overflow-y-auto top-0">
                    <p class="my-3 mx-2 fw-semibold fs-5">Chat List</p>
                    <div class="list-group list-group-flush rounded-4 mb-4">
                        <?php
                            $sql="SELECT * FROM users WHERE username != '$username';";
                            $result=mysqli_query($conn, $sql);
                            while ($row=mysqli_fetch_assoc($result)) {
                                if($row['username']!="moderator"){
                                    echo "<a href='chat.php?penerima=".$row['username']."' class='list-group-item chat-list bg-body-tertiary'>
                                                <div class='box-kontak d-flex align-content-center'>
                                                    <img src='image/".$row['gambar']."' class='profile-image my-auto mx-3'>
                                                    <div class='text-kontak'>
                                                        <p class='mt-3 mx-3'>".$row['username']."</p>
                                                    </div>
                                                </div>
                                            </a>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        <!-- Chat list end -->
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>




        <?php
    }
?>
