<?php
	session_start();
	include("koneksi.php");
	$pengirim=$_GET['pengirim'];
	$sql="DELETE FROM users WHERE username='$pengirim'";
	$result=mysqli_query($conn, $sql);
	if($result){
		echo "<script>alert('Akun anda berhasil dihapus');</script>";
		session_destroy();
        echo "<script>window.location.href='login.php';</script>";
        exit();
		//header("location: admin-status.php");
	}
?>