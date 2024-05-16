<?php
	include("koneksi.php");
	session_start();
	$username = $_SESSION['username'];

	if(isset($_POST['ganti'])){
		$foto = $_FILES['photo']['name'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		move_uploaded_file($file_tmp, 'image/'. $foto);

		// Use prepared statement to prevent SQL injection
		$sql = "UPDATE users SET gambar=? WHERE username=?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, 'ss', $foto, $username);
		mysqli_stmt_execute($stmt);

		// Redirect to the profile page after updating the image

		$sql2="SELECT * FROM users WHERE username='$username'";
		$result2=mysqli_query($conn, $sql2);
		while($row=mysqli_fetch_assoc($result2)){
			$_SESSION['gambar']= $row['gambar'];
		}
		header("location: profile.php");
		exit();
	}
?>
