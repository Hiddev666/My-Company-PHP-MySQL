<?php
require('../library/fpdf.php');
include '../config.php';
 
$start_date = $_POST['start-date'];
$end_date = $_POST['end-date'];


$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA KARYAWAN MY COMPANY',0,0,'C');


$pdf->SetY(14);
$pdf->SetX(-125);
$pdf->Cell(10,15,$start_date,0,1);

$pdf->SetY(14);
$pdf->SetX(-102.5);
$pdf->Cell(10,15,'-',0,1);

$pdf->SetY(14);
$pdf->SetX(-100);
$pdf->Cell(10,15,$end_date,0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NRP',1,0,'C');
$pdf->Cell(55,7,'NAMA' ,1,0,'C');
$pdf->Cell(50,7,'JABATAN',1,0,'C');
$pdf->Cell(40,7,'DEPARTEMEN',1,0,'C');
$pdf->Cell(35,7,'TANGGAL INPUT',1,0,'C');



 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($db,"select b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan order by nama asc;");
$urut = mysqli_query($db, "select b.tgl_input, b.nrp, b.nama, c.jabatan, a.departemen from departemen a inner join pegawai b on a.id_departemen = b.id_departemen inner join jabatan c on b.id_jabatan = c.id_jabatan WHERE tgl_input BETWEEN '$start_date' AND '$end_date';");

if(isset($_POST['print-urut'])) {
  while ($bar = mysqli_fetch_array($urut)) {
    $pdf->Cell(10,6, $bar['nrp'],1,0,'C');
    $pdf->Cell(55,6, $bar['nama'],1,0);
    $pdf->Cell(50,6, $bar['jabatan'],1,0);  
    $pdf->Cell(40,6, $bar['departemen'],1,0);  
    $pdf->Cell(35,6, $bar['tgl_input'],1,1);
  }
} else {
  while($d = mysqli_fetch_array($data)){
    $pdf->Cell(10,6, $d['nrp'],1,0,'C');
    $pdf->Cell(55,6, $d['nama'],1,0);
    $pdf->Cell(50,6, $d['jabatan'],1,0);  
    $pdf->Cell(40,6, $d['departemen'],1,1);
  }
}


 
$pdf->Output();
 
?>