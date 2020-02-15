<h2>Data Pengaturan</h2>

<?php 
$datapengaturan = $pengaturan->tampil_pengaturan();
?>

 <table class="table table-bordered" id="thetable">
 	<thead>
 		<tr>
 			<th>No.</th>
 			<th>Kolom</th>
 			<th>Isi</th>
 			<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($datapengaturan as $key => $value): ?>
 			
 		<tr>
 			<td><?php echo $key+=1; ?></td>
 			<td><?php echo $value['kolom']; ?></td>
 			<td><?php echo $value['isi']; ?></td>
 			<td>
 				<a href="index.php?halaman=ubahpengaturan&id=<?php echo $value['id_pengaturan']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></a>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>