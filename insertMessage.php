<?php
	session_start();
	include("koneksi.php");


	$fromUser = $_POST['fromUser'];
	$toUser = $_POST['toUser'];
	$message = $_POST['message'];

	$output="";
	$sql = "INSERT INTO pesan (pengirim, penerima, isi) VALUES ('$fromUser', '$toUser', '$message');";
	$result = mysqli_query($conn, $sql);
	if($result){
		$output.="";
	}else{
		$output.="Error. Please try again";
	}
	echo $output;



	/*$sql = "INSERT INTO pesan (pengirim, penerima, pesan) VALUES (?, ?, ?)";
	$stmt = mysqli_prepare($conn, $sql);
	if ($stmt) {
	    mysqli_stmt_bind_param($stmt, "sss", $fromUser, $toUser, $message);
	    if (mysqli_stmt_execute($stmt)) {
	        $output = "Pesan berhasil disimpan.";
	    } else {
	        $output = "Gagal menyimpan pesan.";
	    }
	    mysqli_stmt_close($stmt);
	} else {
	    $output = "Gagal menyiapkan pernyataan.";
	}*/

?>