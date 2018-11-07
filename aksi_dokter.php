
<?php
include('koneksi.php');
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$con=mysqli_connect("localhost","root","","rs");
	$tambah = mysqli_query($con,"INSERT INTO dokter (id_dok,nama_dok,bidang,no_telp,alamat)
	VALUES ('$_POST[id_dok]','$_POST[nama_dok]','$_POST[bidang]',
	'$_POST[no_telp]','$_POST[alamat]')");
	
	if($tambah)
		header("location:index.php?page=dokter");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$con=mysqli_connect("localhost","root","","rs");
$hapus = mysqli_query ($con,"DELETE FROM dokter where id_dok='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=dokter");
}
else if ($_GET['proses']=='update') {
//skrip update
$con=mysqli_connect("localhost","root","","rs");
$ubah = mysqli_query ($con,"UPDATE dokter SET
						
				nama_dok 		= '$_POST[nama_dok]',
				bidang	 		= '$_POST[bidang]',
				no_telp 		= '$_POST[no_telp]',
				alamat 			= '$_POST[alamat]' WHERE id_dok='$_POST[id_dok]'");
if($ubah){
	header("location:index.php?page=dokter");
}
}

?>