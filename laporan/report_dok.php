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
$pdf->Cell(190,7,'DAFTAR DOKTER ',0,1,'C');

//Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(40,6,'NAMA DOKTER',1,0,'C');
$pdf->Cell(30,6,'BIDANG',1,0,'C');
$pdf->Cell(30,6,'NO TELP',1,0,'C');
$pdf->Cell(45,6,'ALAMAT',1,1,'C');

$pdf->SetFont('Arial','',10);

$con=mysqli_connect("localhost","root","","rs");

$dokter = mysqli_query($con,"select * from dokter");
include('../koneksi.php');
$no=1;
while ($row = mysqli_fetch_array($dokter)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(40,6,$row['nama_dok'],1,0);
	$pdf->Cell(30,6,$row['bidang'],1,0);
	$pdf->Cell(30,6,$row['no_telp'],1,0);
	$pdf->Cell(45,6,$row['alamat'],1,1);
	$no++;
}
$pdf->Output();
?>