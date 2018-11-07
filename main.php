<?php
include ('koneksi.php');
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include ('home.php');
if ($page=='pasien') include ('pasien.php');
if ($page=='dokter') include ('dokter.php');
if ($page=='keluhan') include ('keluhan.php');
if ($page=='obat') include ('obat.php');
if ($page=='user') include ('user.php');

?>