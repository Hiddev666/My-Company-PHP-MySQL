<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
    <link rel="stylesheet" href="../css/input.css">

<body>

    <form action="proses-pendaftaran.php" method="POST">

        <fieldset>

        <p>
            <label for="nrp">NRP: </label>
            <input type="text" name="nik" placeholder="nik" />
        </p>
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nik" />
        </p>
        <p>
        <select id="jabatan" required="isikan dulu" class="form-control" name="jabatan">

<option value="">--Pilih Jenis Barang--</option>

<?php

    include "config.php"; //ini untuk sambung ke file koneksi

    $queryJenis = mysqli_query($db, "select * from jabatan");

    if (mysqli_num_rows($queryJenis)) {

        while($row=mysqli_fetch_assoc($queryJenis)):

    ?>

        <option value="<?= $row['id_jabatan']; ?>"><?= $row['jabatan']; ?></option>

    <?php endwhile; } ?>

</select>
        </p>
        <p>
            <select id="departemen" class="departemen" name="departemen">
                <option value="">Pilih Departemen</option>
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
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>

    </form>

    </body>
</html>