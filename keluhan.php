<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>ENTRI DATA PASIEN</h1>
<form action="aksi_keluhan.php?proses=tambah" method="post">

	<div class="form-group">
		<label>ID Keluhan</label>
		<input type="text" name="idkeluhan" placeholder=" " required class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Keluhan</label><br/>
		<select name="nama_keluhan">
		<option>Flu</option>
		<option>Batuk</option>
		<option>Sakit Kepala</option>
		<option>Demam</option></select>
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
<a href="?page=keluhan&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Entri Data Keluhan</a>
<a href="laporan/report_keluhan.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a></br>
<table class="table table-hover" id="dataTables-example"><br/>
<thead>
	<tr>
		<th>No</th>
		<th>ID Keluhan</th>
		<th>Nama Keluhan</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>	
	<?php
	$con=mysqli_connect("localhost","root","","rs");
	$q=mysqli_query($con,"SELECT * FROM keluhan");
	$no = 1;
	while ($data = mysqli_fetch_array($q)) 
	{ 
	?>
		<tr align=left>
			<td><?php echo $no ?></td>
			<td><?php echo $data['idkeluhan'] ?></td>
			<td><?php echo $data['nama_keluhan'] ?></td>
			<td><a href="aksi_keluhan.php?proses=hapus&id_hapus=<?php echo $data['idkeluhan'] ?>" onclick="return confirm('Data akan Dihapus?')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=keluhan&aksi=edit&id_edit=<?php echo $data['idkeluhan'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>				 
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
$ambil = mysqli_query ($con,"SELECT *FROM keluhan WHERE idkeluhan='$_GET[id_edit]'");
$data = mysqli_fetch_array($ambil);
?>

<h1>EDIT DATA DOKTER</h1>
<form action="aksi_keluhan.php?proses=update" method="post">

	<div class="form-group">
		<label></label>
		<input type="hidden" value="<?php echo $data['idkeluhan'] ?>" name="idkeluhan" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Keluhan</label><br/>
		<select name="nama_keluhan">
		<option>Flu</option>
		<option>Batuk</option>
		<option>Sakit Kepala</option>
		<option>Demam</option></select>
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