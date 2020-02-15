<?php 

include '../config/class.php';
$mutasi = $api_mutasi->mutasi_terakhir();

print_r($mutasi);
foreach ($mutasi as $key => $value) {
	# code...
	if($value['type']=="CR"){
		$pembelian->cek_pembayaran($value['amount'],date("Y-m-d", strtotime($value['date'])));
	}
}