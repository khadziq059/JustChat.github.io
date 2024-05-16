<?php
	session_start();
	include("koneksi.php");
	$fromUser = $_POST['fromUser'];
	$toUser = $_POST['toUser'];
	$output="";
	
	$chats = mysqli_query($conn, "SELECT * FROM pesan WHERE (pengirim = '$fromUser' AND penerima = '$toUser') OR (pengirim = '$toUser' AND penerima = '$fromUser');");
	//$sql="SELECT * FR"		

	while($chat = mysqli_fetch_assoc($chats)){
		if($chat["pengirim"] == $fromUser){
			$output.= "<div class='message sent align-self-end'>
                            <p>".$chat['isi']."</p>
                        </div>";
		}else{
			$output.= "<div class='message received align-self-start'>
                            <p>".$chat['isi']."</p>
                        </div>";
		}
	}
	echo $output;

?>