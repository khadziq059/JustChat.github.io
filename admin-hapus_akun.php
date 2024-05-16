<?php
	include("koneksi.php");
	$penerima=$_GET['penerima'];
	$sql="DELETE FROM users WHERE username='$penerima'";
	$result=mysqli_query($conn, $sql);
	if($result){
		echo "<script>alert('Akun berhasil dihapus');</script>";
        echo "<script>window.location.href='admin-index.php';</script>";
        exit();
		//header("location: admin-status.php");
	}
?>