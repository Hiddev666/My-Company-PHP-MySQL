<?php
include("../config.php");

$start_date = $_POST['start-date'];
$end_date = $_POST['end-date'];

$sql = "select b.tgl_input, b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan WHERE tgl_input BETWEEN '$start_date' AND '$end_date';";
$query = mysqli_query($db, $sql);

while ($pegawai = mysqli_fetch_array($query)) {

    echo "<tr>";

    echo "<td id='no'>" . $pegawai['nrp'] . "</td>";
    echo "<td>" . $pegawai['nama'] . "</td>";
    echo "<td>" . $pegawai['jabatan'] . "</td>";
    echo "<td>" . $pegawai['departemen'] . "</td>";
    echo "<td>" . $pegawai['tgl_input'] . "</td>";

    echo "</tr>";
}


?>