<?php  
$datakonfirmasi = $konfirmasi->tampil_konfirmasi();
?>

<h2>Data Konfirmasi Pembayaran Pelanggan</h2>

<table class="table table-bordered" >
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama </th>
			<th>Bank Tujuan Transfer</th>
			<th>Besar Pembayaran</th>
			<th>Tanggal Pembayaran</th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datakonfirmasi as $key => $value): ?>
					
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama_konfirmasi']; ?></td>
				<td><?php echo $value['btt_konfirmasi']; ?></td>
				<td><?php echo $value['bp_konfirmasi']; ?></td>
				<td><?php echo $value['tp_konfirmasi']; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>