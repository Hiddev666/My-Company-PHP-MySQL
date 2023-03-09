<?php 
include '../config.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php");
}
 
// menampilkan pesan selamat datang
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | My Company</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="../css/delete.css">
</head>
<body>


    <div class="register-container">
        <div class="register-right">
        <a href="index.php"><img src="../images/back-blue.png" alt="btn-back" class="btn-back"></a>
            <div class="register-title-wrapper">
                <h1 class="register-title">Hapus Pegawai</h1>

            </div>
            <div class="form-wrapper">
                <form action="delete.php" method="POST">
                    <p>
                        <input type="text" name="nrp" class="input-nrp" placeholder="Masukkan NRP Pegawai yang akan dihapus...">
                    </p>
                    <p>
                        <div class="submit-wrapper">
                        <input type="submit" value="Hapus" name="submit" class="submit" />
                        </div>
                    </p>
                </form>
            </div>
        </div>
        <div class="register-left">
            <div class="logo-an">
            <img src="../logo.png" alt="logo" class="logo">
        <div class="underlinee"></div>
            </div>
        </div>
    </div>

</body>
</html>