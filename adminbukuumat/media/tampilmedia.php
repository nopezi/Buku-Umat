<?php 
$datamedia = $media->tampil_media();
?>

<h2>Data media</h2>
<table class="table table-bordered" id="thetable">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datamedia as $key => $value): ?>
			
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama_media']; ?></td>
				<td><?php echo $value['foto_media']; ?></td>
				<td>
					<a href="index.php?halaman=ubahmedia&id=<?php echo $value['id_media']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
