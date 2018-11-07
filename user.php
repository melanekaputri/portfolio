<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
case 'entri' :
?>
<h1>ENTRI USER</h1>
<form action="aksi_user.php?proses=tambah" method="post">

	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" placeholder="Username" required class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" placeholder="Password" required class="form-control">
	</div>
	<div class="form-group">
		<label>Level</label>
		<input type="text" name="level" class="form-control">
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
<h1>DATA USER</h1>
<a href="?page=user&aksi=entri" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Entri DATA USER</a></br>
<table class="table table-hover" id="dataTables-example"><br/>
<thead>
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<?php
	$con=mysqli_connect("localhost","root","","rs");
	$q=mysqli_query($con,"SELECT *FROM user");
	$no=1;
	while ($data = mysqli_fetch_array($q))
	{ 
	?>
		<tr align=left>
			<td><?php echo $no ?></td>
			<td><?php echo $data['username'] ?></td>
			<td><?php echo $data['password'] ?></td>
			<td><?php echo $data['level'] ?></td>
			<td><a href="aksi_user.php?proses=hapus&id_hapus=<?php echo $data['username'] ?>" onclick="return confirm('Data akan Dihapus?')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a> | 
			<a href="?page=user&aksi=edit&id_edit=<?php echo $data['username'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>				 
		</tr>
		<?php
		$no++;
	}
		?>	
</body>
</table>
<?php
break;
case 'edit' :
?>
<?php
$con=mysqli_connect("localhost","root","","rs");
$ambil = mysqli_query ($con,"SELECT *FROM user WHERE username='$_GET[id_edit]'");
$data = mysqli_fetch_array($ambil);
?>

<h1>EDIT DATA USER</h1>
<form action="aksi_user.php?proses=update" method="post">

	<div class="form-group">
		<label></label>
		<input type="hidden" value="<?php echo $data['username'] ?>" name="username" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" value="<?php echo $data['password'] ?>" name="password" class="form-control">
	</div>
	<div class="form-group">
		<label>Level</label>
		<input type="text" value="<?php echo $data['level'] ?>" name="level" class="form-control">
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



