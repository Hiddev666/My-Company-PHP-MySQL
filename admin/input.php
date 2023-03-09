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
    <title>Register | My Company</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="../css/input.css">
</head>
<body>


    <div class="register-container">
        <div class="register-left">
            <div class="left-top">
                <a href="index.php"><img src="../images/back.png" alt="btn-back" class="btn-back"></a>
            </div>
            <div class="logo-an">
            <img src="../logo.png" alt="logo" class="logo">
        <div class="underlinee"></div>
            </div>
        </div>
        <div class="register-right">

            <div class="register-title-wrapper">
                <h1 class="register-title">Input Pegawai</h1>

            </div>
            <div class="form-wrapper">
                <form action="proses-pendaftaran.php" method="POST">
                    <p>
                        <label for="nrp" class="label-nrp">Nrp</label><br>
                        <input type="text" name="nrp" class="input-nrp">
                    </p>
                    <p>
                        <label for="nama" class="label-nama">Nama</label><br>
                        <input type="text" name="nama" class="input-nama">
                    </p>
                    <p>
                    <label for="departemen" class="label-jabatan">Jabatan</label>
                        <select id="jabatan" required="isikan dulu" class="jabatan" name="jabatan">
                                <?php
                                    include "config.php";
                                    $queryJenis = mysqli_query($db, "select * from jabatan");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                            ?>
                            <option value="<?= $row['id_jabatan']; ?>"><?= $row['jabatan']; ?></option>
                                <?php endwhile; } ?>
                        </select>
                    </p>
                    <p>
                        <label for="departemen" class="label-departemen">Departemen</label>
                        <select id="departemen" class="departemen" name="departemen">
                                 <?php
                                    include "config.php";
                                    $querydept = mysqli_query($db, "select * from departemen");
                                    if (mysqli_num_rows($querydept)) {
                                        while($raw=mysqli_fetch_assoc($querydept)):
                                            ?>
                            <option value="<?= $raw['id_departemen'];?>"><?= $raw['departemen'];?></option>
                                <?php endwhile; } ?>
                        </select>  
                    </p>
                    <p>
                        <div class="submit-wrapper">
                        <input type="submit" value="Daftar" name="daftar" class="submit" />
                        </div>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>