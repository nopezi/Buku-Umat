<?php  
$datarequest = $request->tampil_request_admin();
?>

<h2>Data Request Pelanggan</h2>

<table class="table table-bordered" >
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Anda</th>
			<th>Nomor HP</th>
			<th>Judul Buku</th>
			<th>Penulis</th>
			<th>Penerbit</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datarequest as $key => $value): ?>
			<?php $i = 1; ?>
			
			<tr>
				<td><?php echo $key+$i; ?></td>
				<td><?php echo $value['nama_request']; ?></td>
				<td><?php echo $value['hp_request']; ?></td>
				<td><?php echo $value['judul_request']; ?></td>
				<td><?php echo $value['penulis']; ?></td>
				<td><?php echo $value['penerbit']; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>