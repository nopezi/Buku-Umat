<h2>Nota Pembelian</h2>
<?php 

// mendapatkan id pembelian dari url
// bila mendapat dari  formulir pakai $_POST maka dari url pakai $_GET

$id_pembelian = $_GET['id'];

$produkpembelian = $pembelian->tampil_produk_pembelian($id_pembelian);

$detailpembelian = $pembelian->ambil_pembelian($id_pembelian);



?>

<div class="row">


	<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="text-center">Nota Pembelian Pelanggan</h3>
						</div>
						<div class="panel-body">
							 <div class="row">
 	<div class="col-md-6">
 		<h3>Pembelian</h3>
 		<p>No. INVOICE: <?php echo $detailpembelian['id_pembelian']; ?></p>
 		<p>Tanggal: <?php echo $detailpembelian['tgl_beli']; ?>: </p>
 		<p>
 			<?php if(strtolower($detailpembelian['status_pembelian']) == 'lunas'){ ?>
			Status: <span class="btn btn-success btn-xs"><?php echo $detailpembelian['status_pembelian']; ?></span> 
			<?php }else{ ?>
 			Status: <span class="btn btn-danger btn-xs"><?php echo $detailpembelian['status_pembelian']; ?></span> 
	 		<?php } ?>
 		</p>
 		<p>
 			No. Resi : 
 			<?php if (empty($detailpembelian['no_resi'])): ?>
 				<b>Resi belum keluar</b>
 				<?php else: ?>
 					<b><?php echo $detailpembelian['no_resi']; ?></b>
 			<?php endif ?>
 		</p>
 	</div>
 	
 	<div class="col-md-6">
 		<h3>Pengiriman</h3>
 		
 		<p>Nama : <?php echo $detailpembelian["nama_penerima"]; ?></p>
 		<p>Telepon : <?php echo $detailpembelian["telp_penerima"]; ?></p>
 		<p>Alamat : <?php echo $detailpembelian["alamat_penerima"]; ?></p>
 		<p>	<?php echo $detailpembelian["kodepos_penerima"]; ?>	</p>
 		<P>
 			Pengiriiman: <?php echo $detailpembelian['paket_expedisi']; ?>,
 			<?php echo $detailpembelian['expedisi']; ?>
 		

 		</P>
 	</div>
 </div>

 <table class="table table-bordered table-hover table-striped">
 	<thead>
 		<tr>
 			<th>No.</th>
 			<th>Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Sub Berat</th>
 			<th>Sub Harga</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($produkpembelian as $key => $value): ?>
 			<tr>
 				<td><?php echo $key+=1; ?></td>
 				<td><?php echo $value['nama_produk']; ?></td>
 				<td><?php echo $value['harga_produk']; ?></td>
 				<td><?php echo $value['berat_produk']; ?></td>
 				<td><?php echo $value['jumlah_produk']; ?></td>
 				<td><?php echo $value['subberat_produk']; ?></td>
 				<td><?php echo $value['subharga_produk']; ?></td>
 			</tr>
 		<?php endforeach ?>
 	</tbody>
 	<tfoot>
 		<tr>
 			<th colspan="6">Total Belanja</th>
 			<th>Rp. <?php echo number_format($detailpembelian["total_harga"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Total Ongkos Kirim</th>
 			<th>Rp. <?php echo number_format($detailpembelian["biaya_ongkir"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Potongan</th>
 			<th>Rp. <?php echo number_format($detailpembelian["potongan"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Kode Unik</th>
 			<th>Rp.  <?php echo number_format($detailpembelian["kode_unik"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Total Pembelian</th>
 			<th>Rp.  <?php echo number_format($detailpembelian["total_harga"]+$detailpembelian["biaya_ongkir"]+$detailpembelian['kode_unik']-$detailpembelian['potongan']); ?></th>
 		</tr>

 	</tfoot>

 
