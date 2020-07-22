

@if($data == [])

<?= $form->
		field($data,"no_rekening")
		->input([
			'readonly' => true,
			'value' => $no_rekening
		])
		->label('No Rekening')
		->get() ?>
@else

<?= $form->
		field($data,"no_rekening")
		->input([
			'readonly' => true,
		])
		->label('No Rekening')
		->get() ?>

@endif

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



<?= $form->field($data,"saldo")->number([
		"min" => request()->cms['saldo_awal_minimal']
	],true)
	->label('Saldo Awal')
	->get() ?>