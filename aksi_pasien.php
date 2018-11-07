
<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$con=mysqli_connect("localhost","root","","rs");
	$tambah = mysqli_query($con,"INSERT INTO pasien (idpasien,nama_pasien,jekel,no_telp,alamat)
	VALUES ('$_POST[idpasien]','$_POST[nama_pasien]','$_POST[jekel]',
	'$_POST[no_telp]','$_POST[alamat]')");
	
	if($tambah)
		header("location:index.php?page=pasien");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$con=mysqli_connect("localhost","root","","rs");
$hapus = mysqli_query ($con,"DELETE FROM pasien where idpasien='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=pasien");
}
else if ($_GET['proses']=='update') {
//skrip update
$con=mysqli_connect("localhost","root","","rs");
$ubah = mysqli_query ($con,"UPDATE pasien SET
						
				nama_pasien 		= '$_POST[nama_pasien]',
				jekel		 		= '$_POST[jekel]',
				no_telp				= '$_POST[no_telp]',
				alamat 				= '$_POST[alamat]' WHERE idpasien='$_POST[idpasien]'");
if($ubah){
	header("location:index.php?page=pasien");
}
}

?>