
<?= $form->field($data,'lama_terlambat')->input([
		"readonly" => "true"
	])->label('Lama Keterlambatan ( Hari )')->get() ?>      	

<?= $form->field($data,'denda')->input([
		"readonly" => "true"
	])->label('Denda ( Rp ) ')->get() ?>      	

<?= $form->field($data,'total_bayar')->input([
		"readonly" => "true"
	])->label('Harus Dibayarkan ( Rp )')
	->get() ?>

<?= $form->field($data,'uang_dibayarkan')->number()->label('Uang Dibayarkan ( Rp )')
	->get() ?>

<?= $form->field($data,'kembalian')->number([
		"readonly" => "true"
	])->label('Kembalian ( Rp )')
	->get() ?>