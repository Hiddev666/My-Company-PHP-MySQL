<?php

include("../config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];

    // buat query
    $sql = "update pegawai set  nama='$nama', id_jabatan='$jabatan', id_departemen='$departemen' where nrp='$nrp';";
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