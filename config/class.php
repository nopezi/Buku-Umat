<?php 
session_start();
$mysqli = new mysqli("localhost", "u7951607_goonpro", "Bismillah", "u7951607_bukuumat" );


class admin
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_admin()
	{
		$semuadata = array();
		$ambildata = $this->koneksi->query("SELECT * FROM admin");
		while($pecahdata = $ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}
	
	function simpan_admin($nama, $email, $pass, $jk, $telp, $alamat, $foto)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		
		// mengenkripsi password dengan sha1
		$pass = sha1($pass);

		$waktu = date("Y_m_d_H_i_s");
		$namafiks = $waktu."_".$namafoto;
		move_uploaded_file($lokasifoto, "../assets/foto_admin/$namafiks");

		$this->koneksi->query("INSERT INTO admin (nama_admin, email, password, jk_admin, telp_admin, alamat_admin, foto_admin) VALUES ('$nama', '$email', '$pass', '$jk', '$telp', '$alamat', '$namafiks')");
	}

	function hapus_admin($ida)
	{
		$dataadmin = $this->ambil_admin($ida);
		$fotoygmaudihapus = $dataadmin['foto_admin'];
		if (file_exists("../assets/foto_admin/$fotoygmaudihapus"))
		{
			unlink("../assets/foto_admin/$fotoygmaudihapus");
		}
		$this->koneksi->query("DELETE FROM admin WHERE id_admin='$ida'");

	}
	function ambil_admin($ida)
	{
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE id_admin='$ida'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function ubah_admin($nama, $email, $password, $jk, $tlp, $alamat, $foto, $ida )
	{

		$password = sha1($password);
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];

		if(!empty($lokasifoto))
		{

			$dataadmin = $this->ambil_admin($ida);
			$fotoygmaudihapus = $dataadmin['foto_admin'];

			if(file_exists("../assets/foto_admin/$fotoygmaudihapus"))
			{
				unlink("../assets/foto_admin/$fotoygmaudihapus");
			}

	// upload foto baru
			move_uploaded_file($lokasifoto, "../assets/foto_admin/$namafoto" );
	// mengubah data ke database
			$this->koneksi->query("UPDATE admin SET nama_admin='$nama', email='$email', password='$password', jk_admin='$jk', telp_admin='$tlp',  alamat_admin='$alamat', foto_admin='$namafoto' WHERE id_admin = '$ida'");
		}
	// selain itu , maka tidak mengubah foto
		else 
		{
			$this->koneksi->query("UPDATE admin SET nama_admin='$nama', email='$email', password='$password', jk_admin='$jk', telp_admin='$tlp',  alamat_admin='$alamat' WHERE id_admin = '$ida'");
		}
	}


	function login_admin($em, $ps)


	{

		$pass = sha1($ps);
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE email='$em' AND password='$pass' ");
		$yangcocok = $ambil->num_rows;

		if($yangcocok==1)
		{
			$akun = $ambil->fetch_assoc();
			
			$_SESSION['admin'] = $akun;
			return "sukses";
		}
		else
		{
			return "gagal";
		}


	}
}

class kategori{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_kategori()
	{
		$data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kategori");

		while($pecah = $ambil->fetch_assoc())
		{
			$data[] = $pecah;
		}
		return $data;
	}

	function tambah_kategori($nama, $ket )
	{
		$ambil = $this->koneksi->query("SELECT * FROM kategori WHERE nama_kategori='$nama'");
		$hitung = mysqli_num_rows($ambil);
		if($hitung>0)
		{
			return "gagal";
		}
		else
		{

			$this->koneksi->query("INSERT INTO kategori (nama_kategori, keterangan_kategori) VALUES ('$nama', '$ket')");
			return "sukses";
		}


	}
	function ambil_kategori($idp)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kategori WHERE id_kategori='$idp'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function ubah_kategori($nama, $keterangan, $id)
	{
		$this->koneksi->query("UPDATE kategori SET nama_kategori='$nama', keterangan_kategori='$keterangan' WHERE id_kategori='$id'");
	}

	function hapus_kategori($id_kategori)
	{
		$this->koneksi->query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");
	}

}


class produk extends foto_produk{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_produk($page=0,$limit=99999999999)
	{
		$semuadata = array();
		$ambildata = $this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $page,$limit");
		
		while ($pecahdata = $ambildata->fetch_assoc()) {

			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function tampil_produk_terbaru(){
		$semuadata = array();
		$ambildata = $this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY id_produk DESC LIMIT 8");
		
		while ($pecahdata = $ambildata->fetch_assoc()) {

			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function tampil_produkkategori($id)
	{
		$semuadata = array();
		$ambildata = $this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id'");
		while ($pecahdata = $ambildata->fetch_assoc()) {
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function ambil_produk($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_produk='$id'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;

	}

	function simpan_produk($id_kategori, $isbn, $nama_produk, $penulis, $penerbit,  $jenis_cover, $berat, $stok_produk, $harga_produk,  $potongan, $nominal, $harga_potongan, $sinopsis, $foto )
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$ekstensifoto = pathinfo($namafoto, PATHINFO_EXTENSION);
		$ekstensiboleh = array("jpg", "png", "jpeg", "gif", "JPG", "JPEG", "PNG");

		$waktu = date("Y_m_d_H_i_s");
		$namafiks = $waktu."_".$namafoto;

		if(empty($lokasifoto)){
			$this->koneksi->query("INSERT INTO  produk (id_kategori, isbn, nama_produk, penulis, penerbit,   jenis_cover, berat_produk, stok_produk, harga_produk, potongan, nominal, harga_potongan,  sinopsis) VALUES ('$id_kategori', '$isbn', '$nama_produk', '$penulis', '$penerbit', '$jenis_cover', '$berat', '$stok_produk','$harga_produk', '$potongan', '$nominal', '$harga_potongan', '$sinopsis')");
		}else{
			if(in_array($ekstensifoto, $ekstensiboleh))
			{
				move_uploaded_file($lokasifoto, "../assets/foto_produk/$namafiks");

				$this->koneksi->query("INSERT INTO  produk (id_kategori, isbn, nama_produk, penulis, penerbit,   jenis_cover, berat_produk, stok_produk, harga_produk, potongan, nominal, harga_potongan,  sinopsis) VALUES ('$id_kategori', '$isbn', '$nama_produk', '$penulis', '$penerbit', '$jenis_cover', '$berat', '$stok_produk','$harga_produk', '$potongan', '$nominal', '$harga_potongan', '$sinopsis')");
		// or die (mysqli_error($this->koneksi));


		// mengambil id_produk yg baru saja disimpan
				$id_produk_terbaru = mysqli_insert_id($this->koneksi);

		// menyimpan data foto produk ke table foto_produk
				$this->koneksi->query("INSERT INTO foto_produk(id_produk, nama_foto) VALUES ('$id_produk_terbaru','$namafiks')");

			}
		}
	}

	function tampil_produk_terlaris()
	{
		$semua = array();

		$ambil = $this->koneksi->query("SELECT SUM(jumlah_produk) as total_jumlah, produk.* FROM detail_pembelian JOIN pembelian ON detail_pembelian.id_pembelian=pembelian.id_pembelian JOIN produk ON detail_pembelian.id_produk=produk.id_produk WHERE status_pembelian='Lunas' GROUP BY detail_pembelian.id_produk ORDER BY total_jumlah DESc LIMIT 3")or die(mysqli_error($this->koneksi));


		while ($data = $ambil->fetch_assoc())
		{
			$semua[] = $data;
		}

		return $semua;
	}

	function hapus_produk ($id_produk)
	{
		$fotoproduk = $this->foto_produk($id_produk);

		foreach ($fotoproduk as $key => $value) {
			if(file_exists("../assets/foto_produk/".$value['nama_foto'])){
				unlink("../assets/foto_produk/".$value['nama_foto']);
			}
		}

		$this->koneksi->query("DELETE FROM foto_produk WHERE id_produk='$id_produk'");

		$this->koneksi->query("DELETE FROM produk WHERE id_produk='$id_produk'");
	}

	function ubah_produk($idkategori, $isbn,  $nama, $penulis, $penerbit, $cover, $harga, $berat, $stok_produk, $diskon, $hemat, $hargapromo, $sinopsis, $idproduk)
	{
		$this->koneksi->query("UPDATE produk SET id_kategori='$idkategori', isbn='$isbn', nama_produk='$nama', penulis='$penulis', penerbit='$penerbit', jenis_cover='$cover', harga_produk='$harga', berat_produk='$berat', stok_produk='$stok_produk', potongan='$diskon', nominal='$hemat', harga_potongan='$hargapromo', sinopsis='$sinopsis' WHERE id_produk='$idproduk' ");
	}

	// function tambah_foto_produk ($foto, $id_produk)
	// {
	// 	$namafoto = $foto['name'];
	// 	$lokasifoto = $foto['tmp_name'];

	// 	move_uploaded_file($lokasifoto, "../assets/foto_produk/$namafoto");
	// 	$this->koneksi->query("INSERT INTO foto_produk (id_produk, nama_foto) VALUES ('$id_produk', '$namafoto')");
	// }

	function tampil_produk_baru()
	{
		$ambil = $this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY produk.id_produk LIMIT 2");
		while ($pecah = $ambil->fetch_assoc())
		{
			$data[] =$pecah;

		}
		return $data;
	}

	function pagination()
	{
		
		
		$halaman = 10; //batasan halaman
		$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		$query = $this->koneksi->query("select * from produk JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $mulai, $halaman");
		$sql = $this->koneksi->query("SELECT * from produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
		$total = mysqli_num_rows($sql);
		$pages = ceil($total/$halaman); 

		return $pages;
	}
	
	function paginasi_tampil()
	{
		$halaman = 10; //batasan halaman
		$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		$query = $this->koneksi->query("SELECT * from produk JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $mulai, $halaman");
		$sql = $this->koneksi->query("select * from produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
		$total = mysqli_num_rows($sql);
		$pages = ceil($total/$halaman); 

		return $query;
	}

	function cari_produk($cari){
		$data = array();
		$query = $this->koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$cari%'");
		
		while($result=$query->fetch_assoc()){
			$data[] = $result;
		}

		return $data;
	}

}



class foto_produk 
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function foto_produk($id_produk)
	{
		
		$data = array();
		$ambil = $this->koneksi->query("SELECT * FROM foto_produk WHERE id_produk='$id_produk'");
		while ( $pecahdata = $ambil->fetch_assoc())
		{
			$data[]=$pecahdata;
		}
		return $data;
	}

	function ambil_foto_produk($id_foto)
	{
		$ambil = $this->koneksi->query("SELECT * FROM foto_produk WHERE id_foto='$id_foto'")		;
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function hapus_foto_produk($id_foto)
	{
		$data_lama = $this->ambil_foto_produk($id_foto);
		$foto_lama = $data_lama['nama_foto'];
		if(file_exists("../assets/foto_produk/$foto_lama"))
		{
			unlink("../assets/foto_produk/$foto_lama");
		}
		$this->koneksi->query("DELETE FROM foto_produk WHERE id_foto='$id_foto'");

	}

	function tambah_foto_produk($foto, $id_produk)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];

		$waktu = date("Y_m_d_H_i_s");
		$namafiks = $waktu."_".$namafoto;
		move_uploaded_file($lokasifoto, "../assets/foto_produk/$namafiks");

		$this->koneksi->query("INSERT INTO foto_produk (id_produk, nama_foto) VALUES ('$id_produk', '$namafiks')");
	}
}



// class diskon
// {
// 	public $koneksi;
// 	function __construct($mysqli)
// 	{
// 		$this->koneksi = $mysqli;
// 	}

// 	function tampil_diskon()
// 	{
// 		$semuadata = array();
// 		$ambil = $this->koneksi->query("SELECT * FROM diskon");
// 		while ( $pecah = $ambil->fetch_assoc())
// 		{
// 			$semuadata[] = $pecah;

// 		}
// 		return $semuadata;
// 	}

// 	function simpan_diskon($nama, $pd, $awdis, $akdis )
// 	{
// 		$ambil = $this->koneksi->query("INSERT INTO diskon WHERE nama_diskon='$nama'");
// 		$hitung = mysqli_num_rows($ambil);
// 		if($hitung>0)
// 		{
// 			return "gagal";
// 		}else{
// 			$this->koneksi->query("INSERT INTO diskon (nama_diskon, persen_diskon, awal_diskon, akhir_diskon) VALUES ('$nama', '$pd', '$awdis', '$akdis') ");
// 			return "sukses";
// 		}
// 	}

// 	function hapus_diskon($id)
// 	{
// 		$this->koneksi->query("DELETE FROM diskon WHERE id_diskon='$id'");
// 	}

// 	function ubah_diskon($nama, $pd, $awdis, $akdis, $idd)
// 	{
// 		$this->koneksi->query("UPDATE diskon SET nama_diskon='$nama', persen_diskon='$pd', awal_diskon='$awdis', akhir_diskon='$akdis' WHERE id_diskon='$idd'  ");
// 	}

// 	function ambil_diskon($idd)
// 	{
// 		$ambil = $this->koneksi->query("SELECT * FROM diskon WHERE id_diskon='$idd' ");
// 		$pecah = $ambil->fetch_assoc();
// 		return $pecah;
// 	}
// }

class pengaturan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_pengaturan()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM pengaturan");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecah;
		}
		return $semuadata;

	}


	function ambil_pengaturan($id)

	{
		$ambil = $this->koneksi->query("SELECT * FROM pengaturan WHERE id_pengaturan='$id'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function ubah_pengaturan($kolom, $isi, $id)

	{
		$this->koneksi->query("UPDATE pengaturan SET kolom='$kolom', isi='$isi' WHERE id_pengaturan='$id' ");
	}
}


class pembelian extends produk
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_pembelian()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM pembelian ORDER BY id_pembelian DESC");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecah;
		}
		return $semuadata;
	}

	function tampil_produk_pembelian($id_pembelian)
	{
		// menampilkan data dari pembelian tabel pembellian detail yag id_pembelianadlah #id pembelian 
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM detail_pembelian WHERE id_pembelian='$id_pembelian' ");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecah;
		}
		return $semuadata;
	}

	function ambil_pembelian($id_pembelian)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembelian WHERE pembelian.id_pembelian='$id_pembelian'");

		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function cek_pembelian($kode_pembelian)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembelian WHERE pembelian.kode_pembelian='$kode_pembelian'");

		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}

	function ambil_pembayaran($id_pembelian)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian' ");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
	
	function tambah_pembelian($tg_beli, $total_beli, $total_berat, $total_belanja, $biaya_paket, $nama_ekspedisi, $nama_paket, $nama_penerima, $alamat_penerima, $telepon_penerima, $email, $kodepos,$status_pembelian, $status_kirim, $potongan)
	{

		if(empty($potongan)){
			$potongan=0;
		}
		$kode_unik = rand(10,999);

		$kode = date("dHis");
		$random = array();
		$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 4; $i++){
			$n = rand(0, $alphaLength);
			$random[] = $alphabet[$n];
		}
		$noInvoice = implode($random).$kode;
		$this->koneksi->query("INSERT INTO pembelian (kode_pembelian, tgl_beli, total_beli, total_berat, total_harga, biaya_ongkir, expedisi, paket_expedisi, nama_penerima, alamat_penerima, telp_penerima, kodepos_penerima,status_pembelian, status_kirim, potongan, kode_unik) VALUES ('$noInvoice','$tg_beli', '$total_beli', '$total_berat', '$total_belanja', '$biaya_paket', '$nama_ekspedisi', '$nama_paket', '$nama_penerima', '$alamat_penerima', '$telepon_penerima', '$kodeopos', '$status_pembelian', '$status_kirim', '$potongan', '$kode_unik')")or die(mysqli_error($this->koneksi));

		$id_pembelian = mysqli_insert_id($this->koneksi);

		foreach($_SESSION['keranjang'] as $id_produk => $jumlah_beli){
			$value = $this->ambil_produk($id_produk);
			$nama_produk = $value['nama_produk'];
			$harga_produk = $value['harga_potongan'];
			$berat_produk = $value['berat_produk'];
			$jumlah_produk = $jumlah_beli;
			$subberat_produk = $jumlah_produk * $berat_produk;
			$subharga_produk = $jumlah_produk * $harga_produk;

			$this->koneksi->query("INSERT INTO detail_pembelian (id_produk, id_pembelian, nama_produk, harga_produk, berat_produk, jumlah_produk, subberat_produk, subharga_produk) VALUES ('$id_produk','$id_pembelian', '$nama_produk', '$harga_produk', '$berat_produk', '$jumlah_produk', '$subberat_produk', '$subharga_produk')");
		}

		$total=$total_belanja+$biaya_paket-$potongan;

		$this->kirim_email($email,$nama_penerima,$total,$noInvoice);
		// menghapus SESSION keranjang
		unset($_SESSION['keranjang']);
		
		// Mengambil nilai dari id_pembelian, untuk digunakan dalam pembuatan nota
		return $id_pembelian;
	}

	function kirim_email($email,$nama,$total,$kode){

		$body = "Anda telah melakukan pembelian di Toko Online Buku Umat, invoice Anda adalah <a href='bukuumat.xyz/nota.php?id=".$kode."'> ".$kode."</a> dengan total harga ".$total." , silakan melakukan transfer ke rekening berikut (transfer wajib mencantumkan 3 digit terakhir/kode unik, agar pembelian cepat diproses) : <br>
		BRI : 301801010924539 a.n KHOLIDUN<br>
		Mandiri : 9000044713619 a.n MAESAROH";


		require "email_phpmailer/phpmailer/PHPMailerAutoload.php";
		$mail = new PHPMailer();

		$mail->IsSMTP(); // telling the class to use SMTP

	// TAMBAHAN
	// Menggunakan SMTP option. Agar jika localhost pakai SSL tetep kekirim emailnya.
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

	$mail->Host = "smtp.gmail.com"; // SMTP server 
	$mail->SMTPDebug = 0; // enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only 
	$mail->SMTPAuth = true; // enable SMTP authentication 
	$mail->SMTPSecure = "tls"; // sets the prefix to the servier 
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server 
	$mail->Port = 587; // set the SMTP port for the GMAIL server 
	// $mail->Username = "teamtrainit@gmail.com"; // GMAIL username 
	$mail->Username = "bukuumatofficial@gmail.com"; // GMAIL username 
	$mail->Password = "@Bismillahi1993"; // GMAIL password

	$mail->SetFrom('bukuumatofficial@gmail.com', 'Admin Buku Umat');

	$mail->AddReplyTo("kholidldk@gmail.com","Kholidun");

	$mail->Subject = "Invoice Buku Umat";

	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	// $address = "alifatur212@gmail.com"; 
	$address = $email; 
	$mail->AddAddress($address, $nama);

	// $mail->AddAttachment("images/phpmailer.gif"); // attachment 
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send())
	{
		echo "<pre>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		echo "</pre>";
	} 
	else
	{
		echo "Message sent!";
	}

}

function ubah_pembelian($status, $no_resi, $id){
	$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status', no_resi='$no_resi' WHERE id_pembelian='$id'");
}

function laporan_pembelian(){
	$semua=array();
	$ambil = $this->koneksi->query("SELECT * FROM pembelian WHERE status_pembelian='Lunas'");

	while($data = $ambil->fetch_assoc()){
		$semua[] = $data;
	}
	return $semua;
}

function cari_laporan_pembelian($bulan, $tahun){
	$semua=array();
	$ambil = $this->koneksi->query("SELECT * FROM pembelian WHERE status_pembelian='Lunas' AND MONTH(tgl_beli)='$bulan' AND YEAR(tgl_beli)='$tahun'");

	while($data = $ambil->fetch_assoc()){
		$semua[] = $data;
	}
	return $semua;
}

function cari_laporan_pembelian_tahun( $tahun){
	$semua=array();
	$ambil = $this->koneksi->query("SELECT * FROM pembelian WHERE status_pembelian='Lunas' AND YEAR(tgl_beli)='$tahun'");

	while($data = $ambil->fetch_assoc()){
		$semua[] = $data;
	}
	return $semua;
}

function cek_pembayaran($total_bayar, $tgl){
		// $this->koneksi->query("UPDATE pembelian SET status_pembelian='Lunas' WHERE (total_harga+biaya_ongkir+kode_unik-potongan) = '$total_bayar' AND date(tgl_beli)='$tgl' " );
	$this->koneksi->query("UPDATE pembelian SET status_pembelian='Lunas' WHERE (total_harga+biaya_ongkir+kode_unik-potongan) = '$total_bayar'" )or die(mysqli_error($this->koneksi));
}
}




class keranjang extends produk
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tambah_keranjang($id_produk, $jumlah_pembelian)
	{

		// jika ada session keranjang degan idproduk yang sama maka
		if(isset($_SESSION['keranjang'][$id_produk]))
		{
			// session keranjang dengan id_produk yang sama jumlah belinya di tambahkan dengan jumlah beli yang diinput
			$_SESSION['keranjang'][$id_produk]+=$jumlah_pembelian;
		}
		else
		{

			$_SESSION['keranjang'][$id_produk] = $jumlah_pembelian;
		}
		// mengambil data stok lama
		$produklama = $this->ambil_produk($id_produk);

		// mengambil stok produk
		$sisa_stok = $produklama['stok_produk']-$jumlah_pembelian;

		$this->koneksi->query("UPDATE produk SET stok_produk='$sisa_stok' WHERE id_produk='$id_produk'");


	}

	function tampil_keranjang()
	{
		$data_keranjang = array();
		foreach ($_SESSION['keranjang'] as $id_produk => $jumlah_beli) {
				// memanggil fungsi ambil_produk
			$data_produk = $this->ambil_produk($id_produk);
			$data_produk['jumlah_beli'] = $jumlah_beli;
			$data_keranjang[] = $data_produk;

		}

		return $data_keranjang;
	}

	function hapus_keranjang($id_produk){
		// mengembalikan stok produk yang tadi telah berkurang
		$produklama = $this->ambil_produk($id_produk);

		// mengambil stok produknya
		$stok_produk = $produklama['stok_produk']+$_SESSION['keranjang'][$id_produk];

		// mengembalikan stok produk
		$this->koneksi->query("UPDATE produk SET stok_produk='$stok_produk' WHERE id_produk='$id_produk'");

		// menghapus session keranjang sesuai produk yang dihapus
		unset($_SESSION['keranjang'][$id_produk]);
	}
}


class testimoni
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_testimoni()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query ("SELECT * FROM testimoni");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function simpan_testimoni($nama, $testimoni, $foto)
	{		

		echo "<pre>";
		print_r($foto);
		echo "</pre>";

		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$ekstensifoto = pathinfo($namafoto, PATHINFO_EXTENSION);
		$ekstensiboleh = array("jpg", "png", "jpeg", "JPG", "JPEG");

		$waktu = date("Y_m_d_H_i_s");
		$namafiks = $waktu."_".$namafoto;

		if(in_array($ekstensifoto, $ekstensiboleh))
		{
			move_uploaded_file($lokasifoto, "../assets/foto_testimoni/$namafiks");

			$this->koneksi->query("INSERT INTO testimoni (nama_testimoni, isi_testimoni, foto_testimoni) VALUES ('$nama', '$testimoni', '$namafiks')");
		}
	}

	function ambil_testimoni($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM testimoni WHERE id_testimoni='$id' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function ubah_testimoni($nama, $testimoni, $foto, $id)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];

		if(!empty($lokasifoto))
		{

			$datatestimoni = $this->ambil_testimoni($ida);
			$fotoygmaudihapus = $dataadmin['foto_testimoni'];

			if(file_exists("../assets/foto_testimoni/$fotoygmaudihapus"))
			{
				unlink("../assets/foto_testimoni/$fotoygmaudihapus");
			}

	// upload foto baru
			move_uploaded_file($lokasifoto, "../assets/foto_testimoni/$namafoto" );
	// mengubah data ke database
			$this->koneksi->query("UPDATE testimoni SET nama_testimoni = '$nama', isi_testimoni='$testimoni', foto_testimoni = '$namafoto' WHERE id_testimoni = '$id' ");
		}else
		{


			$this->koneksi->query("UPDATE testimoni SET nama_testimoni = '$nama', isi_testimoni='$testimoni' WHERE id_testimoni = '$id' ");
		}
	}

	function hapus_testimoni($id)
	{
		$datatestimoni = $this->ambil_testimoni($id);
		$fotoygmaudihapus = $datatestimoni['foto_testimoni'];
		if(file_exists("../assets/foto_testimoni/$fotoygmaudihapus"))
		{
			unlink("../assets/foto_testimoni/$fotoygmaudihapus");
		}
		$this->koneksi->query("DELETE FROM testimoni WHERE id_testimoni='$id'");
	}
}


class media
{
	
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_media()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM media ORDER by id_media");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function ambil_media($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM media WHERE id_media='$id' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function ubah_media($nama, $foto, $id)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$ekstensifoto = pathinfo($namafoto, PATHINFO_EXTENSION);
		$ekstensiboleh = array("jpg", "png", 'jpeg', "JPG", "JPEG");

		$waktu = date("Y_m_d_H_i_s");
		$namafiks = $waktu."_".$namafoto;

		if(!empty($lokasifoto))
		{
			$datamedia = $this->ambil_media($id);
			$fotoygmaudihapus = $datamedia['foto_media'];

			if(file_exists("../assets/foto_media/$fotoygmaudihapus"))
			{
				unlink("../assets/foto_media/$fotoygmaudihapus");
			}		
			move_uploaded_file($lokasifoto, "../assets/foto_media/$namafiks");
			$this->koneksi->query("UPDATE media SET nama_media='$nama', foto_media='$namafiks' WHERE id_media = '$id' ");
		}
		else
		{
			$this->koneksi->query("UPDATE media SET nama_media='$nama' WHERE id_media = '$id' ");
		}
		
	}	
}

class request
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function simpan_request($nama, $hp, $judul, $penulis, $penerbit)
	{
		$this->koneksi->query("INSERT INTO request (nama_request, hp_request, judul_request, penulis, penerbit) VALUES ('$nama', '$hp', '$judul', '$penulis', '$penerbit') ");

		// mendapatkan id_request dari table request yang baru saja ditambahkan data adalah sebagai berikut
		$id_request = $this->koneksi->insert_id;

		return $id_request;
	}

	function tampil_request()
	{
		$ambil = $this->koneksi->query("SELECT * FROM request ORDER BY id_request DESC" );
		$pecahdata = $ambil->fetch_assoc();
		$semuadata[] = $pecahdata;
		return $semuadata;
	}

	function tampil_request_admin()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM request ORDER BY id_request DESC" );
		while($pecahdata = $ambil->fetch_assoc())
		{

			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function ambil_request($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM request WHERE id_request='$id'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;


	}
}

class konfirmasi
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function simpan_konfirmasi($nama, $btt, $bp, $tp, $lokasi, $foto, $id)
	{
		move_uploaded_file($lokasi, "assets/bukti/$foto");

		$tgl_konfirmasi = date("Y-m-d");

		$this->koneksi->query("INSERT INTO pembayaran (nama_akun, nama_bank, jumlah_transfer, tgl_transfer, struk_transfer, id_pembelian, tgl_konfirmasi) VALUES ('$nama', '$btt', '$bp', '$tp', '$foto', '$id', '$tgl_konfirmasi') ") or die(mysqli_error($this->koneksi));

		$id_pembayaran = $this->koneksi->insert_id;
		
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='konfirmasi' WHERE id_pembelian='$id'");

		return $id_pembayaran;
	}

	function tampil_konfirmasi()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM konfirmasi" );
		while ($pecahdata = $ambil->fetch_assoc())
		{
			
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

// 	function ambil_konfirmasi($id)
// 	{
// 		$ambil = $this->koneksi->query("SELECT * FROM konfirmasi WHERE id_konfirmasi='$id'");
// 		$pecahdata = $ambil->fetch_assoc();
// 		return $pecahdata;
// 	}

	function ambil_pembayaran($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembayaran WHERE id_pembayaran='$id'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	
}

class apiongkir
{

	function update_provinsi()
	{
		

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 95b37a3ed2fbb0fe7f4c69b41c61c80a"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		else 
		{
			$dataprovinsi = json_decode($response, TRUE);

			$dataprovinsi = $dataprovinsi['rajaongkir']['results'];
			
			return $dataprovinsi;
		}
	}

	function update_kota($id_provinsi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 95b37a3ed2fbb0fe7f4c69b41c61c80a"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$datakota = json_decode($response, TRUE);
			$datakota = $datakota['rajaongkir']['results'];
			return $datakota;
		}
	}


	function update_ongkir($id_kota_asal, $id_kota_tujuan, $berat, $ekspedisi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$id_kota_asal&destination=$id_kota_tujuan&weight=$berat&courier=$ekspedisi",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 95b37a3ed2fbb0fe7f4c69b41c61c80a"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$dataongkir = json_decode($response, TRUE);
			

			$dataongkir = $dataongkir['rajaongkir']['results']['0']['costs'];

			return $dataongkir;

		}
	}

}

class voucher{
	public $koneksi;

	function __construct($mysqli){
		$this->koneksi = $mysqli;
	}

	function cari_voucher($kode){
		$ambil = $this->koneksi->query("SELECT * FROM voucher WHERE kode_voucher='$kode' AND status='Aktif'");

		$data = $ambil->fetch_assoc();

		return $data;
	}

	function simpan_voucher($nama, $potongan){
		$this->koneksi->query("INSERT INTO voucher (kode_voucher, potongan) VALUES ('$nama', '$potongan')AND status='Aktif'");

		
		
	}
}

class api_mutasi{
	
	public $key = 'YoGpnCnKb39y2GZ9w5OSVyLxVmzl8n1Il7sAkEuig7QKvF4GMG';



	function mutasi_terakhir(){
		$bank_id = $this->daftar_bank();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://app.moota.co/api/v1/bank/'.$bank_id.'/mutation/recent/{jumlah}');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
			'Accept: application/json',
			'Authorization: Bearer '.$this->key
		]);
		$response = curl_exec($curl);

		$hasil = json_decode($response,TRUE);

		return $hasil;
	}


	function daftar_bank(){

		$hasil = array();
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://app.moota.co/api/v1/bank');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
			'Accept: application/json',
			'Authorization: Bearer '.$this->key
		]);
		$response = curl_exec($curl);

		$hasil = json_decode($response, TRUE);

		$bank_id = $hasil['data']['0']['bank_id'];

		return $bank_id;
	}
}






$admin = new admin($mysqli);
$kategori = new kategori($mysqli);
$produk = new produk($mysqli);
$foto_produk = new foto_produk($mysqli);
// $diskon = new diskon($mysqli);
$pengaturan = new pengaturan($mysqli);
$pembelian = new pembelian($mysqli);
$keranjang  = new keranjang($mysqli);
$testimoni = new testimoni($mysqli);
$media = new media($mysqli);
$request = new request($mysqli);
$konfirmasi = new konfirmasi($mysqli);
$apiongkir = new apiongkir();
// $pembelian_diskon = new pembelian_diskon($mysqli);
$voucher = new voucher($mysqli);
$api_mutasi = new api_mutasi($mysqli);
$api_mutasi->mutasi_terakhir();


?>