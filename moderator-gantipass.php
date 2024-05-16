<?php
    include("koneksi.php");
    session_start();

    $username = $_SESSION['username'];

    if(isset($_POST['submit'])){
        $passlama = $_POST['passwordlama'];
        $passbaru = $_POST['passwordbaru'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if(password_verify($passlama, $hashedPassword)){
            // Hash the new password
            $hashedNewPassword = password_hash($passbaru, PASSWORD_DEFAULT);

            $sql2 = "UPDATE users SET password='$hashedNewPassword' WHERE username='$username'";
            $result2 = mysqli_query($conn, $sql2);

            if($result2){
            	echo "<script>alert('Password berhasil diubah');</script>";
                echo "<script>window.location.href='moderator-profile.php';</script>";
                exit();
            } else {
                echo "<script>alert('Gagal mengupdate password');</script>";
                echo "<script>window.location.href='moderator-profile.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Periksa kembali password lama anda');</script>";
            echo "<script>window.location.href='moderator-profile.php';</script>";
            exit();
        }
    }
?>