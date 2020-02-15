<h2>Data Admin</h2>

<?php 

$dataadmin = $admin->tampil_admin();

$aktif = "admin";
 ?>




 <table class="table table-bordered" id="thetable">
 	<thead>
 		<tr>
 			<th>No.</th>
 			<th>Nama Lengkap</th>
 			<th>Email</th>
 			<th>Jenis Kelamin</th>
 			<th>Telepon</th>
 			<th>Alamat</th>
 			<th>Foto</th>
 			<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($dataadmin as $key => $value): ?>
 			<tr>
 			<td><?php echo $key+=1; ?></td>
 			<td><?php echo $value['nama_admin']; ?></td>
 			<td><?php echo $value['email']; ?></td>
 			<td><?php echo $value['jk_admin']; ?></td>
 			<td><?php echo $value['telp_admin']; ?></td>
 			<td><?php echo $value['alamat_admin']; ?></td>
 			<td>
 				<img src="../assets/foto_admin/<?php echo $value['foto_admin']; ?>" width="70px">
 			</td>
 			<td>
 				<a href="index.php?halaman=ubahadmin&id=<?php echo $value['id_admin']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></a>
 				<a onclick="return confirm('Apakah Anda yakin mau menghapus data admin ini?')" href="index.php?halaman=hapusadmin&id=<?php echo $value['id_admin']; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>

 </table>

<a href="index.php?halaman=tambahadmin" class="btn btn-primary">Tambah Data</a>