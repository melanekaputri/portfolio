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
$pdf->Cell(190,7,'DAFTAR KELUHAN ',0,1,'C');

//Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(30,6,'ID',1,0,'C');
$pdf->Cell(70,6,'NAMA KELUHAN',1,1,'C');


$pdf->SetFont('Arial','',10);

$con=mysqli_connect("localhost","root","","rs");

$keluhan = mysqli_query($con,"select * from keluhan");
include('../koneksi.php');
$no=1;
while ($row = mysqli_fetch_array($keluhan)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(30,6,$row['idkeluhan'],1,0);
	$pdf->Cell(70,6,$row['nama_keluhan'],1,0);
	$no++;
}
$pdf->Output();
?>