<?php
	include("koneksi.php");
	$id_status=$_GET['id_status'];
	$sql="DELETE FROM status WHERE id_status='$id_status'";
	$result=mysqli_query($conn, $sql);
	if($result){
		header("location: moderator-status.php");
	}
?>