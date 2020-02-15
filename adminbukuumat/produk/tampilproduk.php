<h2>Data Produk</h2>
<?php 
$dataproduk = $produk->tampil_produk();
?>

<table class="table table-bordered" id="thetable">
	<thead>
		<tr>
			<th>No.</th>
			<th>ISBN</th>
			<th>Kategori</th>
			<th>Nama Produk</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Harga produk</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($dataproduk as $key => $value): ?>
						
			<tr>
				<td><?php echo $key+=1; ?></td>
				<td><?php echo $value['isbn']; ?></td>
				<td><?php echo $value['nama_kategori']; ?></td>
				<td><?php echo $value['nama_produk']; ?></td>
				<td><?php echo $value['penulis']; ?></td>
				<td><?php echo $value['penerbit']; ?></td>
				<td><?php echo $value['harga_produk']; ?></td>
			<td>
					<a href="index.php?halaman=ubahproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></a>
					<a onclick="return confirm('Apakah Anda yakin ingin menghapus data Produk?')" href="index.php?halaman=hapusproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
					<a href="index.php?halaman=detailproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-primary btn-xs">Detail</a>
					<a href="index.php?halaman=fotoproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-default btn-xs">Foto Produk</a>
			</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-default btn-primary">Tambah Produk</span></a>


