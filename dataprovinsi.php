<?php 
include 'config/class.php';



$datprov = $apiongkir->update_provinsi();



 ?>

 <option>Pilih Provinsi</option>

 <?php foreach ($datprov as $key => $value): ?>
 	<option value="<?php echo $value['province_id'] ?>" nama="<?php echo $value['province'] ?>">
 		<?php echo $value['province']; ?>
 	</option>
 <?php endforeach ?>