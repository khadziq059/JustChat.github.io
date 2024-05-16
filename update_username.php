<?php
	include("koneksi.php");
	session_start();

	$namalama=$_SESSION['username'];

	if(isset($_POST['ganti'])){
		$namabaru=$_POST['newUsername'];
		$sql = "SELECT * FROM users WHERE username='$namabaru'";
    	$result = mysqli_query($conn, $sql);

    	if(mysqli_num_rows($result)>0){
    		echo "<script>alert('Username telah digunakan pengguna lain, silahkan ganti dengan username lain');</script>";
			echo "<script>window.location.href='profile.php';</script>";
			exit();
    	}else{
    		$sql2 = "UPDATE users SET username='$namabaru' where username='$namalama'";
    		$result2=mysqli_query($conn, $sql2);
    		$_SESSION['username']=$namabaru;
    		header("location: profile.php");
    		exit();
    	}
	}

?>