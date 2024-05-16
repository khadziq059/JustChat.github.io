<?php
    session_start();
    include("koneksi.php");
    include("link.php");

    $pengirim=$_SESSION['username'];
    $penerima=$_GET['penerima'];
    $sql="SELECT * FROM users WHERE username='$penerima'";
    $result=mysqli_query($conn, $sql);
    //$gambar=$result['gambar'];
    while($row=mysqli_fetch_assoc($result)){
        $gambar=$row['gambar'];
        $email=$row['email'];
    }

?>
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="stylesheet" href="css/chat.css">

    <!-- Font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900& display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>

    <link rel="icon" href="image/JC.ico" type="image/x-icon">
    <title>Chat - JustChat</title>
  </head>
  <body>
    <!-- Navbar WhatsApp -->
    <div class="row nav sticky-top m-auto">
        <div class="col-1 d-flex">
            <a href="index.php" title="Back"><i class="fas fa-arrow-left"></i></a>
        </div>                        
        <div class="profil col-1 d-flex">
            <a href="userProfile.php?penerima=<?php echo$penerima; ?>" title="Profile"><img src="image/<?php echo $gambar; ?>" alt="profile"></a>
        </div>
        <div class="col-8 d-flex">
            <p class="mb-0"><?php echo $penerima; ?></p>
        </div>
        <div class="col-1 d-flex">
            <div class="dropdown">
                <button class="btn dropdown-toggle" title="Menu" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navbar end -->
    <div class="pesan container bg-body-tertiary min-vh-100">
        <div class="main">
            <div class="row">
        <!-- Chat -->
        <div class="container chat d-flex flex-column" id="msgBody">
            <?php
                $sql="SELECT * FROM pesan WHERE (pengirim='$pengirim' AND penerima='$penerima') OR (pengirim='$penerima' AND penerima='$pengirim');";
                $result=mysqli_query($conn, $sql);
                while($chat=mysqli_fetch_assoc($result)){
                    if($pengirim==$chat['pengirim']){
                        echo "<div class='message sent align-self-end'>
                            <p>".$chat['isi']."</p>
                        </div>";
                    }else{
                        echo "<div class='message received align-self-start'>
                            <p>".$chat['isi']."</p>
                        </div>";
                    }
                }
            ?>
        </div>
        <!-- Chat end -->
        <!-- Input pesan -->
        <div class="input-pesan chat-input bg-body-secondary">
            <div class="col-10 mt-3">
                <form action="" method="post" name="form" enctype="multipart/form-data">
                    <input type="text" class="form-control" aria-label="Document Name" id="message" placeholder="Type your message...">
            </div>
                    <div class="col-2 mt-1 d-grid">
                        <button type="button" id="send" class="btn btn-primary" style="max-width: 100%;">Send</button>
                    </div>
                </form>
        </div>
        <!-- Input pesan end -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <input type="text" id="fromUser" value="<?php echo $pengirim ?>" hidden>
    <input type="text" id="toUser" value="<?php echo $penerima ?>" hidden>

  <script type="text/javascript">
        $(document).ready(function(){
            $("#send").on("click", function(){
                $.ajax({
                    url: "insertMessage.php",
                    method: "POST",
                    data: {
                        fromUser: $("#fromUser").val(), 
                        toUser: $("#toUser").val(), 
                        message: $("#message").val()    
                    },
                    dataType: "text",
                    success: function(data){
                        $("#message").val("");

                    }
                });
            });
            setInterval(function(){

                $.ajax({
                    url: "realTimeChat.php",
                    method: "POST",
                    data: {
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val(),
                    },
                    dateType: "text",
                    success: function(data){
                        $("#msgBody").html(data);
                    }

                });
            }, 700);
        });
    </script>

  </body>
</html>