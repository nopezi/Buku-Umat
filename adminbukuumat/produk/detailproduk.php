<h2>Detail Produk</h2>

<?php 

$dataproduk =$produk->ambil_produk($_GET['id']);
$datafoto = $foto_produk->foto_produk($_GET['id']);

?>



<table class="table table-bordered">
	<tr>
		<th width="20%">Kategori</th>
		<td>: <?php echo $dataproduk['nama_kategori']; ?></td>
	</tr>
	<tr>
		<th width="20%">Isbn</th>
		<td>: <?php echo $dataproduk['isbn']; ?></td>
	</tr>

	<tr>
		<th width="20%">Judul</th>
		<td>: <?php echo $dataproduk['nama_produk']; ?></td>
	</tr>
	<tr>
		<th width="20%">Penulis</th>
		<td>: <?php echo $dataproduk['penulis']; ?></td>
	</tr>
	<tr>
		<th width="20%">Penerbit</th>
		<td>: <?php echo $dataproduk['penerbit']; ?></td>
	</tr>
	<tr>
		<th width="20%">Jenis Cover</th>
		<td>: <?php echo $dataproduk['jenis_cover']; ?></td>
	</tr>
	<tr>
		<th width="20%">Harga</th>
		<td>: Rp. <?php echo $dataproduk['harga_produk']; ?></td>
	</tr>
	<tr>
		<th width="20%">berat/tebal</th>
		<td>: <?php echo $dataproduk['berat_produk']; ?> gr/hlm</td>
	</tr>
	<tr>
		<th width="20%">Stok produk</th>
		<td>: <?php echo $dataproduk['stok_produk']; ?></td>
	</tr>
	<tr>
		<th width="20%">potongan</th>
		<td>: <?php echo $dataproduk['potongan']; ?> % (persen)</td>
	</tr>
	<tr>
		<th width="20%">nominal </th>
		<td>: Rp. <?php echo $dataproduk['nominal']; ?></td>
	</tr>
	<tr>
		<th width="20%">harga potongan</th>
		<td>: Rp. <?php echo $dataproduk['harga_potongan']; ?></td>
	</tr>
	<tr>
		<th width="20%">sinopsis</th>
		<td>: <?php echo $dataproduk['sinopsis']; ?></td>
	</tr>
	
	<tr>
		<th width="20%">Foto</th>
		<td>
			<?php foreach ($datafoto as $key => $value): ?>
				<img src="../assets/foto_produk/<?php echo $value['nama_foto']; ?>" width="150px" class="img-rounded">
			<?php endforeach ?>
		</td>
	</tr>
</table>