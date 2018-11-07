<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>ENTRI DATA OBAT</h1>
<form action="aksi_obat.php?proses=tambah" method="post">

	<div class="form-group">
		<label>ID Obat</label>
		<input type="text" name="idobat" placeholder=" " required class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Obat</label><br/>
		<select name="jenis_obat">
		<option>Sachet</option>
		<option>Pil</option>
		<option>Kapsul</option>
		<option>Sirup</option></select>
	</div>
	<div class="form-group">
		<label>Nama Obat</label>
		<input type="text" name="nama_obat" placeholder=" " required class="form-control">
	</div>
		<div class="form-group">
		<label>Takaran Obat</label><br/>
		<select name="takaran">
		<option>1 X Sehari</option>
		<option>2 X Sehari</option>
		<option>3 X Sehari</option>
		<option>4 X Sehari</option></select>
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
<h1>DATA OBAT</h1>
<a href="?page=obat&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Entri Data Obat</a>
<a href="laporan/report_obat.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a></br>
<table class="table table-hover" id="dataTables-example"><br/>
<thead>
	<tr>
		<th>No</th>
		<th>ID Obat</th>
		<th>Jenis Obat</th>
		<th>Nama Obat</th>
		<th>Takaran</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>	
	<?php
	$con=mysqli_connect("localhost","root","","rs");
	$q=mysqli_query($con,"SELECT * FROM obat");
	$no = 1;
	while ($data = mysqli_fetch_array($q)) 
	{ 
	?>
		<tr align=left>
			<td><?php echo $no ?></td>
			<td><?php echo $data['idobat'] ?></td>
			<td><?php echo $data['jenis_obat'] ?></td>
			<td><?php echo $data['nama_obat'] ?></td>
			<td><?php echo $data['takaran'] ?></td>
			<td><a href="aksi_obat.php?proses=hapus&id_hapus=<?php echo $data['idobat'] ?>" onclick="return confirm('Data akan Dihapus?')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=obat&aksi=edit&id_edit=<?php echo $data['idobat'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>				 
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
$ambil = mysqli_query ($con,"SELECT *FROM obat WHERE idobat='$_GET[id_edit]'");
$data = mysqli_fetch_array($ambil);
?>

<h1>EDIT DATA OBAT</h1>
<form action="aksi_obat.php?proses=update" method="post">

	<div class="form-group">
		<label></label>
		<input type="hidden" value="<?php echo $data['idobat'] ?>" name="idobat" class="form-control">
	</div>
	<div class="form-group">
		<label>Jenis Obat</label><br/>
		<select name="jenis_obat">
		<option>Sachet</option>
		<option>Pil</option>
		<option>Kapsul</option>
		<option>Sirup</option></select>
	</div>
	<div class="form-group">
		<label>Nama Obat</label>
		<input type="text" value="<?php echo $data['nama_obat'] ?>" name="nama_obat" class="form-control">
	</div>
	<div class="form-group">
		<label>Takaran Obat</label><br/>
		<select name="takaran">
		<option>1 X Sehari</option>
		<option>2 X Sehari</option>
		<option>3 X Sehari</option>
		<option>4 X Sehari</option></select>
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