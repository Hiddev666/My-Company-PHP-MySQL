<?php

include("../config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];

    // buat query
    $sql = "INSERT INTO pegawai (nrp, nama, id_jabatan, id_departemen) VALUE ('$nrp', '$nama', '$jabatan', '$departemen')";
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