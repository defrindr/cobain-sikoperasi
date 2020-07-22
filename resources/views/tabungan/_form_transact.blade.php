<?= $form->field($data,"tabungan_id")->hidden([
		"value" => $data->id
	])
	->get() ?>

<?= $form->field($data,"action")->select([
		"simpan" => "Menabung",
		"ambil" => "Mengambil Tabungan",
	])
	->label('Aksi')
	->get() ?>

<?= $form->field($data,"value")->number([
		"min" => request()->cms['saldo_awal_minimal']
	],true)
	->label('Jumlah Value')
	->get() ?>