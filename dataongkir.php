<?php 
include 'config/class.php';

$dataongkir = $apiongkir->update_ongkir(419,$_POST['id_kota'],$_POST['total_berat'],$_POST['ekspedisi']);




 ?>

 

 <pre><?php print_r($_POST); ?></pre>

 <option>Pilih Ongkir</option>
 <?php foreach ($dataongkir as $key => $value): ?>
 	<option value="" 
 	nama="<?php echo $value['service']; ?>"
 	biaya="<?php echo $value['cost']['0']['value']; ?>"
 	lama="<?php echo $value['cost']['0']['etd']; ?>"
 	>
 		<?php echo $value['service']; ?>
 		Rp. <?php echo number_format($value['cost']['0']['value']); ?>
 		<?php echo $value['cost']['0']['etd'];  ?> 
 	</option>
 <?php endforeach ?>