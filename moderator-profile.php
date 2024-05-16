<?php
    include("koneksi.php");
    session_start();
    $pengirim = $_SESSION['username'];
    $sql="SELECT * FROM users WHERE username='$pengirim'";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $gambar=$row['gambar'];
        $email=$row['email'];
    }
    //$gambar=$result['gambar'];
    //$email=$result['email'];



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
    <link rel="stylesheet" href="css/profile.css" />

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

    <title>Profile Admin</title>
  </head>
  <body>
    <!-- Navbar -->
    <div class="row nav sticky-top m-auto">
      <div class="col-1 d-flex">
        <a href="moderator-status.php"><i class="fas fa-arrow-left"></i></a>
      </div>
      <div class="col-11 d-flex">
        <p class="mb-0">Profile</p>
      </div>
    </div>
    <!-- Navbar end -->
    <div class="update container bg-body-tertiary min-vh-100 overflow-hidden">
      <!-- Update Profile Form -->
      <div class="container update-profile">
        <div class="row">
            <div class="edit-profile d-flex justify-content-center card bg-body-tertiary shadow-sm align-center mx-auto">
            <h6 class="mt-3 mb-0"><i class="fas fa-pen"></i> Edit Profile</h6>
            <hr />
            <form
              action="moderator-update_foto.php"
              method="POST"
              enctype="multipart/form-data"
            >
              <div class="photo d-grid justify-content-center text-center mx-5">
                <label for="image-input">
                  <img src="image/<?php echo $gambar; ?>" alt="profil"/>
                  <p id="file-name-container" class="ms-2"></p>
                </label>
                <input
                  type="file"
                  name="photo"
                  id="image-input"
                  style="display: none"
                  onchange="displayFileName()"
                />
                <button type="submit" class="btn btn-primary" name="ganti">Save changes</button>
              </div>
              <div class="text text-center mt-3"><?php echo $email; ?></div>
              <div class="text text-center mt-3 mb-4"><?php echo $pengirim; ?> &nbsp;&nbsp;
              <i
                type="button"
                class="fa-regular fa-pen-to-square"
                data-bs-toggle="modal"
                data-bs-target="#usernameModal"
              ></i>
              </div>
            </form>

            <!-- Modal for changing username UPDATE -->
            <div class="modal fade" id="usernameModal" tabindex="-1" aria-labelledby="usernameModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="usernameModalLabel">Change Username</h5>
                  </div>
                  <div class="modal-body">
                    <form action="update_username.php" method="POST">
                      <div class="mb-3">
                        <label for="newUsername" class="form-label">New Username</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" disabled placeholder="Moderator Cannot Change Username!">
                      </div>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pengaturan akun -->
      <div class="container pengaturan-akun mt-5 card bg-body-tertiary shadow-sm mb-4">
        <div class="col-12">
          <h6 class="mt-3"><i class="fas fa-cog"></i> Setting Account</h6>
          <hr />
          <form action="moderator-gantipass.php" method="POST">
            <!-- Button -->
            <button
              type="button"
              class="btn btn-light pengaturan"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              Change Password
            </button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="exampleModal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                      Change Password
                    </h1>
                  </div>
                  <div class="modal-body">
                    <table>
                      <tr>
                        <td>
                          <label for="passwordlama"
                            >Input Old Password</label
                          >
                        </td>
                        <td>:</td>
                        <td>
                          <input
                            type="password"
                            name="passwordlama"
                            id="passwordlama"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="passwordbaru"
                            >Input New Password</label
                          >
                        </td>
                        <td>:</td>
                        <td>
                          <input
                            type="password"
                            name="passwordbaru"
                            id="passwordbaru"
                          />
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                    <button
                      type="submit"
                      class="btn btn-primary"
                      name="submit"
                    >
                      Save changes
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" name="hapusAkun" class="btn btn-light pengaturan w-100">
              Delete Account
            </button>
          </form>
          <a href="logout.php"><button type="submit" name="logout" class="btn btn-light pengaturan w-100 mb-2">
              Logout
            </button></a>
        </div>
      </div>

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
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
  </body>
</html>
