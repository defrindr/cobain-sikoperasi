
<?php

if($data != []){
	$options = ["disabled" => "disabled"];
}else{
	$options = [];
}

?>

<?= $form->
		field($data,"anggota_id")
		->select($anggota,$arr = $options + [
			'id' => 'anggota_id',
			'class' => 'form-control'
		])->label('Anggota')
		->get() ?>

<?php 
 if($data != []):
?>

<?= $form->field($data,"anggota_id")->hidden()->get() ?>

<?php 
 endif;
?>


<div class="row">
	<div class="col-sm-6">
		<?= $form->
				field($data,"alamat")
				->input([
					'id' => 'alamat_peminjam',
					'readonly' => true
				])->label('Alamat')
				->get() ?>
	</div>
	<div class="col-sm-6">
		<?= $form->
				field($data,"no_hp")
				->input([
					'id' => 'no_hp_peminjam',
					'readonly' => true
				])->label('No HP')
				->get() ?>
	</div>
</div>




<?= $form->
		field($data,"pinjaman_awal")
		->input([
			'id' => 'pinjaman_awal'
		],true)
		->label('Pinjaman Awal')
		->get() ?>


<?= $form->
		field($data,"lama_angsur")
		->select([
			6 => "1/2 Tahun" ,
			12 => "1 Tahun" ,
			24 => "2 Tahun" ,
			36 => "3 Tahun" ,
		],
		$arr = $options + [
			'id' => 'lama_angsur'
		])->label('Lama Angsur')
		->get() ?>
<?php 
 if($data != []):
?>

<?= $form->field($data,"lama_angsur")->hidden()->get() ?>

<?php 
 endif;
?>


<?= $form->
		field($data,"bunga")
		->number([
			'id' => 'bunga'
		])
		->label('Bunga ( % Tahun)')
		->get() ?>
