
<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$con=mysqli_connect("localhost","root","","rs");
	$tambah = mysqli_query($con,"INSERT INTO keluhan (idkeluhan,nama_keluhan)
	VALUES ('$_POST[idkeluhan]','$_POST[nama_keluhan]')");
	
	if($tambah)
		header("location:index.php?page=keluhan");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$con=mysqli_connect("localhost","root","","rs");
$hapus = mysqli_query ($con,"DELETE FROM keluhan where idkeluhan='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=keluhan");
}
else if ($_GET['proses']=='update') {
//skrip update
$con=mysqli_connect("localhost","root","","rs");
$ubah = mysqli_query ($con,"UPDATE keluhan SET 
			nama_keluhan 	= '$_POST[nama_keluhan]' WHERE idkeluhan='$_POST[idkeluhan]'");
if($ubah){
	header("location:index.php?page=keluhan");
}
}

?>