<?php
include '../config/class.php';

if(!isset($_SESSION['admin']))
{
	echo "<script>alert('Anda harus login terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$id_admin = $_SESSION['admin']['id_admin'];

$detailadmin = $admin->ambil_admin($id_admin);

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Buku Umat </title>
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="../assets/fontawesome/css/font-awesome.css">	
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../assets/dist/css/sendiri.css">
</head>
<body>
	<?php 
	$aktif = "home";
	?>

	<div id="wrapper">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Buku Umat</a>
			</div>
		</nav>
		<nav class="navbar-default navbar-side">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<div class="text-center">
							<img src="../assets/foto_admin/<?php echo $detailadmin['foto_admin']; ?>" class="img-circle admin-image">
					</div>
					<li class="<?php if($aktif=="home"){echo "active";} ?>"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li class="<?php if($aktif=="admin"){echo "active";} ?>"><a href="index.php?halaman=admin"><i class="fa fa-user"></i> Admin</a></li>
					<li><a href="index.php?halaman=produk"><i class="glyphicon glyphicon-book"></i> Produk</a></li>
					<li><a href="index.php?halaman=testimoni"><i class="fa fa-whatsapp"></i> Testimoni</a></li>
					<li><a href="index.php?halaman=pembelian"><i class="fa fa-dollar"></i> Pembelian</a></li>
					<li><a href="index.php?halaman=request"><i class="
						glyphicon glyphicon-envelope"></i> Request</a></li>
						<li><a href="index.php?halaman=konfirmasi"><i class="glyphicon glyphicon-ok"></i> Konfirmasi</a></li>
						<li><a href="index.php?halaman=kategori"><i class="fa fa-folder"></i> Kategori</a></li>

						<li><a href="index.php?halaman=media"><i class="glyphicon glyphicon-picture"></i> Media</a></li>
						
						<li><a href="index.php?halaman=laporan"><i class="glyphicon glyphicon-check"></i> Laporan</a></li>
						<li><a href="index.php?halaman=voucher"><i class="glyphicon glyphicon-check"></i> Voucher</a></li>
						<li><a href="index.php?halaman=pengaturan"><i class="fa fa-cog"></i> Pengaturan</a></li>
						<li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
					</div>
				</nav>
				<div id="page-wrapper">
					<div id="page-inner">
						<?php 
						// jika tidak ada parameter halaman(index.php aja)
						if(!isset($_GET['halaman']))
						{
							// panggil file home.php
							include 'home.php';
						}else
						{
							// jk halaman sama dengan kategori, maka panggil file kategori/tampilkategori.php
							if($_GET['halaman']=="kategori")
							{
								include 'kategori/tampilkategori.php';
							}
							elseif ($_GET['halaman']=="tambahkategori") {
								include 'kategori/tambahkategori.php';
							}
							elseif ($_GET['halaman']=="ubahkategori") 
							{
								include 'kategori/ubahkategori.php';
							}
							elseif ($_GET['halaman']=="hapuskategori") {
								include 'kategori/hapuskategori.php';
							}
							elseif($_GET['halaman']=="produk")
							{
								include 'produk/tampilproduk.php';
							}
							elseif($_GET['halaman']=="detailproduk")
							{
								include 'produk/detailproduk.php';
							}
							elseif($_GET['halaman']=="ubahproduk")
							{
								include 'produk/ubahproduk.php';
							}
							elseif($_GET['halaman']=="hapusproduk")
							{
								include 'produk/hapusproduk.php';
							}
							elseif($_GET['halaman']=="tambahproduk") 
							{
								include 'produk/tambahproduk.php';
							}

							elseif($_GET['halaman']=="fotoproduk") 
							{
								include 'produk/fotoproduk.php';
							}
							elseif($_GET['halaman']=="pembelian") 
							{
								include 'pembelian/tampilpembelian.php';
							}
							elseif($_GET['halaman']=='pembayaran')
							{
								include 'pembelian/pembayaran.php';
							}
							elseif($_GET['halaman']=='nota')
							{
								include'pembelian/nota.php';
							}
							elseif ($_GET['halaman']=="pengaturan") 
							{
								include 'pengaturan/tampilpengaturan.php';
							}
							elseif ($_GET['halaman']=="ubahpengaturan") 
							{
								include 'pengaturan/ubahpengaturan.php';
							}
							elseif ($_GET['halaman']=="admin") 
							{
								include 'admin/tampiladmin.php';
							}
							elseif ($_GET['halaman']=="tambahadmin") {
								include 'admin/tambahadmin.php';
							}
							elseif ($_GET['halaman']=="hapusadmin") {
								include 'admin/hapusadmin.php';
							}
							elseif ($_GET['halaman']=="ubahadmin") {
								include 'admin/ubahadmin.php';
							}

							elseif ($_GET['halaman']=="diskon") {
								include 'diskon/tampildiskon.php';
							}
							elseif ($_GET['halaman']=="tambahdiskon") 
							{
								include 'diskon/tambahdiskon.php';
							}elseif ($_GET['halaman']=="hapusdiskon") 
							{
								include 'diskon/hapusdiskon.php';
							}elseif ($_GET['halaman']=="ubahdiskon") {
								include 'diskon/ubahdiskon.php';
							}
							elseif ($_GET['halaman']=="testimoni") {
								include 'testimoni/tampiltestimoni.php';
							}
							elseif($_GET['halaman']=="tambahtestimoni")
							{
								include 'testimoni/tambahtestimoni.php';
							}
							elseif($_GET['halaman']=="ubahtestimoni")
							{
								include 'testimoni/ubahtestimoni.php';
							}
							elseif($_GET['halaman']=="hapustestimoni")
							{
								include 'testimoni/hapustestimoni.php';
							}
							elseif($_GET['halaman']=="logout")
							{
								include 'logout.php';
							}
							elseif($_GET['halaman']=="media")
							{
								include 'media/tampilmedia.php';
							}
							elseif($_GET['halaman']=="ubahmedia")
							{
								include 'media/ubahmedia.php';
							}
							elseif ($_GET['halaman']=="request") 
							{
								include 'request/tampilrequest.php';
							}
							elseif($_GET['halaman']=="pembeliandiskon")
							{
								include 'pembeliandiskon/tampilpembeliandiskon.php';
							}
							elseif($_GET['halaman']=="konfirmasi")
							{
								include 'konfirmasi/tampilkonfirmasi.php';
							}
							elseif($_GET['halaman']=="laporan")
							{
								include 'pembelian/laporan.php';
							}elseif($_GET['halaman']=="voucher")
							{
								include'voucher/tambahvoucher.php';
							}

						}


					// selain itu(ada parameter halaman)

						?>

					</div>
				</div>
			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
			<script src="../assets/dist/js/bukuumat.js"></script>
			<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
			<script>
				$(document).ready(function() {
					$('#thetable').DataTable();
				} );
			</script>

			<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
			<script>
				CKEDITOR.replace("theeditor");
			</script>

			<script>
				setInterval(mutasi,2000);


				function mutasi(){

					$.ajax({
					url:'cek_pembayaran.php',
					success:function(){
						console.log("hasil");
					}
					})
				}
			</script>
		</body>
		</html>