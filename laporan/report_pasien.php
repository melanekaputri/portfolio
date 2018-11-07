<?php

//memanggil library FPDF
require ('fpdf/fpdf.php');
//instance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF();

//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakna
$pdf->SetFont('Arial','B',16);
//mencetak string
$pdf->Cell(190,7,'RUMAH SAKIT BERSAMA ',0,1,'C');
//$pdf->SetFont('Arial','B','12);
$pdf->Cell(190,7,'DAFTAR PASIEN ',0,1,'C');

//Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(10,6,'ID',1,0,'C');
$pdf->Cell(50,6,'NAMA PASIEN',1,0,'C');
$pdf->Cell(30,6,'JENIS KELAMIN',1,0,'C');
$pdf->Cell(30,6,'NO TELP',1,0,'C');
$pdf->Cell(50,6,'ALAMAT',1,1,'C');

$pdf->SetFont('Arial','',10);

$con=mysqli_connect("localhost","root","","rs");

$pasien = mysqli_query($con,"select * from pasien");
include('../koneksi.php');
$no=1;
while ($row = mysqli_fetch_array($pasien)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(10,6,$row['idpasien'],1,0);
	$pdf->Cell(50,6,$row['nama_pasien'],1,0);
	$pdf->Cell(30,6,$row['jekel'],1,0);
	$pdf->Cell(30,6,$row['no_telp'],1,0);
	$pdf->Cell(50,6,$row['alamat'],1,1);
	$no++;
}
$pdf->Output();
?>