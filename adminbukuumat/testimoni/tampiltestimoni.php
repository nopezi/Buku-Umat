<h2>Data Testimoni</h2>
<?php 
$datatestimoni = $testimoni->tampil_testimoni()
?>


<table class="table table-bordered" id="thetable">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Testimoni</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datatestimoni as $key => $value): ?>

			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value["nama_testimoni"]; ?></td>
				<td><?php echo $value["isi_testimoni"]; ?></td>
				<td><?php echo $value["foto_testimoni"]; ?></td>
				<td>
					<a href="index.php?halaman=ubahtestimoni&id=<?php echo $value['id_testimoni']; ?> " class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i>
					</a>
					<a href="index.php?halaman=hapustestimoni&id=<?php echo $value['id_testimoni'] ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<a href="index.php?halaman=tambahtestimoni" class="btn btn-primary">Tambah</a>