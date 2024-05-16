<?php
  if(isset($_POST['gantinama'])){
      $namabaru=$_POST['newUsername'];
      $sql = "SELECT * FROM users WHERE username='$namabaru'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
        echo "<script>alert('username telah digunakan, silakan ganti dengan username lain');</script>";
        exit();
      }else{
        $sql="UPDATE users SET username='$namabaru' WHERE username=$pengirim";
        $_SESSION['username']=$namabaru;
        header("location: profile.php");
      }
    }

?>