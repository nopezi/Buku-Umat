<h2>Data Kategori</h2>

<?php 
$datakategori = $kategori->tampil_kategori();




?>

<table class="table table-bordered" id="thetable">
	<thead>
		<tr>
			<th>NO.</th>
			<th>Nama Kategori</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datakategori as $key => $value): ?>
			<tr>
				<td><?php echo $key+=1; ?></td>
				<td><?php echo $value['nama_kategori'];?></td>
				<td><?php echo $value['keterangan_kategori']; ?></td>
				<td>
					<a href="index.php?halaman=ubahkategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></a>

					<a onclick="return confirm('Apakah Anda yakin mau menghapus data ini?')" 
					href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-danger btn-xs">
						<span class="fa fa-trash"></span>
					</a>

				</td>
			</tr>
		<?php endforeach ?>
	</tbody>

</table>

<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah</a>