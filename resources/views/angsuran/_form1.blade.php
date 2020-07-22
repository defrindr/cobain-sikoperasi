
<?= $form->field($data,'jatuh_tempo')->date([
		"readonly" => "true",
		"value" => Date('Y-m-d',strtotime($data["jatuh_tempo"]))
	
	])->label('Jatuh Tempo')->get() ?>

<?= $form->field($data,'jumlah_angsur')->number([
		"value" => $data->jml_angsur,
		"readonly" => "true"
	])->label('Angsuran Pokok + Bunga ( Rp )')
	->get() ?>