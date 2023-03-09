<?php

include("../config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $nrp = $_POST['nrp'];

    // buat query
    $sql = "delete from pegawai where nrp='$nrp';";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $message = "Data pegawai berhasil disimpan!";
echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $message = "Data pegawai gagal disimpan!";
echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>