

<?= $form
		->field($data,"angsur_perbulan")
		->input(
			[
				"readonly" => "true",
				'id' => 'angsur_perbulan'
			]
		)->label('Jumlah Ansuran / Bulan')
		->get() ?>


<?= $form
		->field($data,"total_pinjaman")
		->input(
			[
				"readonly" => "true",
				'id' => 'total_pinjaman'
			]
		)->label('Total Pinjaman')
		->get() ?>

<?= $form
		->field($data,"tanggal_pinjam")
		->date([
			'readonly' => 'true',
			'value' => date("Y-m-d")
		])->label('Tanggal Pinjam')
		->get() ?>