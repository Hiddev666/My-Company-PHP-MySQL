<?php
include '../config.php';

session_start();

if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}

?>

<?php include("../config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Center | My Company</title>
    <link rel="icon" href="../logo.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header-container">
        <img src="../images/logo.png" alt="logo" class="lg">
        <p style="color: white;">Admin Center</p>
        <form action="input.php" class="register-go">
            <input type="submit" value="Input Pegawai" class="btn-register">
        </form>
        <form action="update-form.php" class="update-go">
            <input type="submit" value="Update Pegawai" class="btn-register">
        </form>
        <form action="delete-form.php" class="update-go">
            <input type="submit" value="Hapus Pegawai" class="btn-register">
        </form>
        <form action="logout.php" class="update-go">
            <input type="submit" value="Logout" class="btn-register">
        </form>
    </div>
    <div class="home-container">
        <div class="home-left">
            <p class="welocomee">Selamat datang di</p>
            <h1 class="welcome">My Company Admin Center</h1>
            <a href="#row">
                <div class="scroll-row">
                    <p class="scroll-text">Scroll Down <br> v</p>
                </div>
            </a>
        </div>
        <div class="home-right">
            <img src="../images/bg.jpg" alt="bg" class="background">
        </div>
    </div>
    <div class="row" id="row">
        <div class="top-tab">
            <form action="#tabel" method="GET" class="search-wrapper">
                <input type="text" name="cari" class="search" placeholder="Cari Pegawai...">
                <a href="#tabel">
                    <div class="btn-cari">
                        <input type="submit" name="search" class="cari-ab"><img src="../images/fi_search.png" alt="searcg" class="cari">
                        <p class="car">Cari</p>
                    </div>
                </a>
            </form>
            <a href="excel.php">
                <div class="print-excel">
                    <p class="print-text">Print to Excel</p>
                    <p></p><img src="../images/excel.png" alt="print" class="btn-print">
                </div>
            </a>
            <a href="report2.php">
                <div class="print">
                    <p class="print-text">Print to PDF</p>
                    <p></p><img src="../images/pdf.png" alt="print" class="btn-print">
                </div>
            </a>
        </div>
        <div class="mid-tab">
            <p class="urutt">Urutkan Data</p>
            <form action="" method="POST" class="urut-form">
                <p>
                    <input type="text" name="start-date" placeholder="Dari tanggal..." class="start-date">
                </p>
                <p>
                    <input type="text" name="end-date" placeholder="Sampai tanggal..." class="end-date">
                </p>
                <p>
                    <input type="submit" name="urut" class="btn-urut" value="Cari" class="urut-cari">
                </p>
                <p>
                    <input type="submit" formaction="excel2.php" name="print-urut" value="Print" class="urut-urut-print-excel">
                </p>
                <p>
                    <input type="submit" formaction="report.php" name="print-urut" value="Print" class="urut-urut-print">
                </p>
            </form>
        </div>
        <div class="table-wrapper">
            <table border="2" rulles="all">
                <thead>
                    <th>Nrp</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Tanggal Input</th>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $sql = "select b.tgl_input, b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan WHERE b.nama LIKE '%$cari%';";
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
                    } elseif (isset($_POST['urut'])) {
                        $start_date = $_POST['start-date'];
                        $end_date = $_POST['end-date'];
                        $sql = "select b.tgl_input, b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan WHERE tgl_input BETWEEN '$start_date' AND '$end_date' order by tgl_input asc;";
                        $query = mysqli_query($db, $sql);
                        while ($bar = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td id='no'>" . $bar['nrp'] . "</td>";
                            echo "<td>" . $bar['nama'] . "</td>";
                            echo "<td>" . $bar['jabatan'] . "</td>";
                            echo "<td>" . $bar['departemen'] . "</td>";
                            echo "<td>" . $bar['tgl_input'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        $sql = "select b.tgl_input, b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan order by tgl_input asc;";
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
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>