<?php
include("config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$login = "select * from admin where username='$username' and password='$password';";
$query = mysqli_query($db, $login);
$cek = mysqli_num_rows($query);

while($row = mysqli_fetch_array($query)) {
    echo "<p>".$row['username']."</p>";
    echo "<p>".$row['password']."</p>";
}


if($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php?status=sukses");
} else {
    header("location:index.php?status=gagal");
}   
?>