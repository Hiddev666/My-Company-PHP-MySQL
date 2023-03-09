<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | My Company</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="header-container">
        <img src="./images/logo.png" alt="logo" class="lg">
        <form action="login-form.php" class="update-go">
            <input type="submit" value="Login Admin" class="btn-register">
        </form>
    </div>

    <div class="home-container">
        <div class="home-left">
        <p class="welocomee">Selamat datang</p>
        <h1 class="welcome">My Company</h1>
        <a href="#row"><div class="scroll-row">
            <p class="scroll-text">Scroll Down <br> v</p>
        </div></a>
        </div>
        <div class="home-right">
            <img src="./images/bg.jpg" alt="bg" class="background">
        </div>
    </div>

    <div class="row" id="row">

        <div class="dept">
            <h2>Tentang My Company</h2>
            <div class="an">
                <div class="underline"></div>
            </div>
            <p class="about">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero nihil aliquam eligendi quaerat est voluptatibus veritatis rem! Accusamus modi ullam impedit in, iure expedita recusandae sequi officia quam, ab corporis? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab, voluptate aperiam deserunt perspiciatis quisquam, sint itaque, aliquid pariatur laborum accusamus magnam? Nulla iusto dolorum modi iste placeat! Dolore, nam sapiente. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime impedit maiores velit ex labore necessitatibus aliquam incidunt a voluptas modi quia, esse commodi corrupti qui sunt mollitia dolore magnam nisi! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex repudiandae cumque quis ea, odio deserunt unde a odit optio neque consectetur ipsa numquam porro magni amet. Dolore inventore repellendus quidem?</p>
            <h2 id="tabel">Departemen Kami</h2>
            <div class="underlinee"></div>
            <ul class="list">
                <?php

                $sql = "select departemen from departemen;";
                $query = mysqli_query($db, $sql);

                while ($dept = mysqli_fetch_array($query)) {
                    echo "<li>" . $dept['departemen'] . "," . "</li>";
                }

                ?>
            </ul>
            <h2 class="employee" >Pegawai Kami</h2>
            <div class="underlineee"></div>
        </div>
        <div class="top-tab">
        <form action="#tabel" method="GET" class="search-wrapper">       
        <input type="text" name="cari" class="search" placeholder="Cari Pegawai...">
                <a href="#tabel"><div class="btn-cari">
                    <input type="submit" name="search" class="cari-ab"><img src="./images/fi_search.png" alt="searcg" class="cari">
                    <p class="car">Cari</p>
                </div></a>
            </form>
            <a href="excel.php">
                <div class="print-excel">
                    <p class="print-text">Print to Excel</p>
                    <p></p><img src="./images/excel.png" alt="print" class="btn-print">
                </div>
            </a>
            <a href="report2.php">
            <div class="print">
                <p class="print-text">Print to PDF</p>
                 <p></p><img src="./images/print.png" alt="print" class="btn-print">
            </div> 
            </a>   
        </div>
            
        <div class="table-wrapper">
            <table border="2" rulles="all">

                <thead>
                    <th>Nrp</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                </thead>
                <tbody>

                    <?php

                    if(isset($_GET['search'])) {
                        $cari = $_GET['cari'];
                        $sql = "select b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan WHERE b.nama LIKE '%$cari%';";
                        $query = mysqli_query($db, $sql);
                        while ($pegawai = mysqli_fetch_array($query)) {

                            echo "<tr>";
    
                            echo "<td id='no'>" . $pegawai['nrp'] . "</td>";
                            echo "<td>" . $pegawai['nama'] . "</td>";
                            echo "<td>" . $pegawai['jabatan'] . "</td>";
                            echo "<td>" . $pegawai['departemen'] . "</td>";
    
                            echo "</tr>";
                        }
                    } else {
                        $sql = "select b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan order by nama asc;";
                        $query = mysqli_query($db, $sql);
                        while ($pegawai = mysqli_fetch_array($query)) {

                            echo "<tr>";
    
                            echo "<td id='no'>" . $pegawai['nrp'] . "</td>";
                            echo "<td>" . $pegawai['nama'] . "</td>";
                            echo "<td>" . $pegawai['jabatan'] . "</td>";
                            echo "<td>" . $pegawai['departemen'] . "</td>";
    
                            echo "</tr>";
                        }
                    }



     

                    ?>

                </tbody>
            </table>
        </div>
       
    </div>

    <div class="slogan">
        <h2 class="slogan-text">"WITH OUR COOPERATION, BUILD EVERYONE'S TRUST." <br> ~My Company</h2>
    </div>

    <div class="motto">
        <h2 class="gallery-title">Galeri Kami</h2>
        <?php
        include('config.php');

        $result = $db->query("SELECT id_foto, deskripsi_foto, foto FROM foto ORDER BY id_foto DESC");
        ?>
        <div class="gallery">
            <?php if ($result->num_rows > 0) { ?>

                <?php while ($row = $result->fetch_assoc()) { 
                    $sql = "select id_foto from foto";
                    $query = mysqli_query($db, $sql);?>
                    <img class="img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['foto']); ?>" />
                    <p class="deskripsi-foto"><?php echo $row['deskripsi_foto']?></p>
                <?php } ?>
                <?php include("config.php");
                    

                    
                ?>
        </div>
        <?php } else { ?>
            <p class="status error">Image(s) not found...</p>
        <?php } ?>

    </div>


</body>

</html>