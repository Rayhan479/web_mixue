<?php
session_start();
if (isset($_SESSION['status'])) {
    header("Location:dashboard/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>LOGIN SISTEM ABSENSI</title>
</head>

<body>
    <div class="container">
        <section class="wrapper">
            
            <h2 class="title">LOGIN<img src="img/login.png" class="rounded-circle logo-image" width="45px"  ></h2>
            <!-- Notifikasi Login -->
            <!-- <?php
            if (isset($_GET['message'])) {
                $msg = $_GET['message'];
                echo "<div class='notif-login'</div>$msg</div>";
            }
            ?>  -->
            <!-- End Notifikasi Login -->

            <div>
                <form action="login.php" method="POST" class="form-login">
                    <label for="">Masukkan ID</label>
                    <input type="number" placeholder="Masukkan Nomer Induk" id="nip" name="nip" class="input-login" required autocomplete="off">

                    <label for="">Masukkan Password</label>
                    <input type="password" placeholder="******" id="password" name="password" class="input-login" required>
                    <button class="button-login log" name="login">LOGIN</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>