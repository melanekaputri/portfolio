<?php
include('koneksi.php');
$pass = md5($_POST['password']);
if ($_GET['proses']=='tambah') {
if (isset($_POST['submit']))
{
	$con=mysqli_connect("localhost","root","","rs");
	$tambah = i($con,"INSERT INTO user (username,password,level)
	VALUES ('$_POST[username]','$pass','$_POST[level]')");
	
	if($tambah)
		header("location:index.php?page=user");	
}
}
else if ($_GET['proses']=='hapus') {
//skrip hapus
$con=mysqli_connect("localhost","root","","rs");
$hapus = mysqli_query ($con,"DELETE FROM user where username='$_GET[id_hapus]'");
if($hapus)
	header("location:index.php?page=user");
}
else if ($_GET['proses']=='update') {
//skrip update
$con=mysqli_connect("localhost","root","","rs");
$ubah = mysqli_query ($con,"UPDATE user SET
						username	 	= '$_POST[username]',
						password 		= '$pass',
						level    		= '$_POST[level]' WHERE username='$_POST[username]'");
if($ubah){
	header("location:index.php?page=user");
}
}
?>