
<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$con=mysqli_connect("localhost","root","","rs");
	$tambah = mysqli_query($con,"INSERT INTO obat (idobat,jenis_obat,nama_obat,takaran)
	VALUES ('$_POST[idobat]','$_POST[jenis_obat]','$_POST[nama_obat]','$_POST[takaran]')");
	
	if($tambah)
		header("location:index.php?page=obat");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$con=mysqli_connect("localhost","root","","rs");
$hapus = mysqli_query ($con,"DELETE FROM obat where idobat='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=obat");
}
else if ($_GET['proses']=='update') {
//skrip update
$con=mysqli_connect("localhost","root","","rs");
$ubah = mysqli_query ($con,"UPDATE obat SET
			jenis_obat  = '$_POST[jenis_obat]',
			nama_obat  = '$_POST[nama_obat]',
			takaran 	= '$_POST[takaran]' WHERE idobat='$_POST[idobat]'");
if($ubah){
	header("location:index.php?page=obat");
}
}

?>