<?php

//memanggil library FPDF
require ('fpdf/fpdf.php');
//instance object dan memberikan pengaturan halaman fpdf
$pdf =new FPDF();

//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B','16');
//mencetak string
$pdf->Cell(190,7,'POLITEKNIK NEGERI PADANG',0,1,'C');
//$pdf->SetFont('Arial','B','16');
$pdf->Cell(190,7,'DAFTAR JURUSAN',0,1,'C');

//Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(190,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(60,6,'NAMA JURUSAN',1,0,'C');
$pdf->Cell(40,6,'JENJANG',1,1,'C');


$pdf->SetFont('Arial','',10);

mysql_connect('localhost','root','');
mysql_select_db('akademik');

$jurusan = mysql_query("select * from jurusan");
$no=1;
while($row = mysql_fetch_array($jurusan)){
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(60,6,$row['nama_jurusan'],1,0);
	$pdf->Cell(40,6,$row['jenjang'],1,1);
	$no++;
}
$pdf->Output();

?>