<?php include("config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai Excel</title>
</head>
<body>
    
<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
}

table {
    border: 1px solid black;
}

th {
    padding: 10px;
    border: 1px solid black;
}

tr {
    padding: 5px;
    border: 1px solid black;
}

td {
    padding: 3px;

    border: 1px solid black;

}
</style>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>

<center>
		<h2>Employee Data of My Company</h2>
	</center>
    
	<center><table rules="all" style="width: 80%;">
        <thead">
            <th>Nrp</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th>Tanggal Input</th>
        </thead>
        <tbody>
            <?php
                $sql = "select b.tgl_input, b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan order by tgl_input asc;";
                $query = mysqli_query($db, $sql);
                // for($no; $no < $num; $no++) {
                    
                // }

                while($row = mysqli_fetch_array($query)) {
                    echo "<tr>";

                    echo "<td>".$row['nrp']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['jabatan']."</td>";
                    echo "<td>".$row['departemen']."</td>";
                    echo "<td>".$row['tgl_input']."</td>";

                    echo "</tr>";

                }

            ?>
        </tbody>
	</table></center>

</body>
</html>