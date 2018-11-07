<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>ENTRI DATA PASIEN</h1>
<form action="aksi_pasien.php?proses=tambah" method="post">

	<div class="form-group">
		<label>ID pasien</label>
		<input type="text" name="idpasien" placeholder=" " required class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Pasien</label>
		<input type="text" name="nama_pasien" placeholder=" " class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label><br/>
		<select name="jekel">
		<option>Laki-Laki</option>
		<option>Perempuan</option></select>
	</div>
	<div class="form-group">
		<label>No Telp</label>
		<input type="text" name="no_telp" placeholder="Nomor Telephone" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea cols=40 rows=5 name="alamat"class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>
			<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			<button type="reset" name="reset" class="btn btn-danger" ><i class="glyphicon glyphicon-refresh"></i> Reset</button>
		</label>
	</div>

</form>

<?php
break;
case 'list' :
?>
<h1>DATA PASIEN</h1>
<a href="?page=pasien&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Entri Data Dosen</a>
<a href="laporan/report_pasien.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a></br>
<table class="table table-hover" id="dataTables-example"><br/>
<thead>
	<tr>
		<th>No</th>
		<th>ID pasien</th>
		<th>Nama Pasien</th>
		<th>Jenis Kelamin</th>
		<th>No Telp</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>	
	<?php
	$con=mysqli_connect("localhost","root","","rs");
	$q=mysqli_query($con,"SELECT * FROM pasien");
	$no = 1;
	while ($data = mysqli_fetch_array($q)) 
	{ 
	?>
		<tr align=left>
			<td><?php echo $no ?></td>
			<td><?php echo $data['idpasien'] ?></td>
			<td><?php echo $data['nama_pasien'] ?></td>
			<td><?php echo $data['jekel'] ?></td>
			<td><?php echo $data['no_telp'] ?></td>
			<td><?php echo $data['alamat'] ?></td>
			<td><a href="aksi_pasien.php?proses=hapus&id_hapus=<?php echo $data['idpasien'] ?>" onclick="return confirm('Data akan Dihapus?')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=pasien&aksi=edit&id_edit=<?php echo $data['idpasien'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>				 
		</tr>
		<?php
		$no++;
	}
		?>
</tbody>		
</table>
<?php
break;
case 'edit' :
?>
<?php
$con=mysqli_connect("localhost","root","","rs");
$ambil = mysqli_query ($con,"SELECT *FROM pasien WHERE idpasien='$_GET[id_edit]'");
$data = mysqli_fetch_array($ambil);
?>

<h1>EDIT DATA DOKTER</h1>
<form action="aksi_pasien.php?proses=update" method="post">

	<div class="form-group">
		<label></label>
		<input type="hidden" value="<?php echo $data['idpasien'] ?>" name="idpasien" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Pasien</label>
		<input type="text" value="<?php echo $data['nama_pasien'] ?>" name="nama_pasien" class="form-control">
	</div>
	<div class="form-group">
		<label>Jekel</label><br/>
		<select name="jekel">
		<option>Laki-Laki</option>
		<option>Perempuan</option></select>
	</div>
	<div class="form-group">
		<label>No Telp</label>
		<input type="text" value="<?php echo $data['no_telp'] ?>" name="no_telp" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea cols=40 rows=5 name="alamat" class="form-control"><?php echo $data['alamat'] ?></textarea>
	</div>
	<div class="form-group">
		<label>
		
			<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
			<input type="reset" value="Reset" name="reset" class="btn btn-danger">
		</label>
	</div>

</form>
<?php
break;
}
?>