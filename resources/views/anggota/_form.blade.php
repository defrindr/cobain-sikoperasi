
<?= $form->field($data,'nama')->input()->label('Nama')->get() ?>      	

<?= $form->field($data,'alamat')->textarea(['placeholder' => "Alamat","style" => "height: 200px"])->label('Alamat')->get() ?>

<?= $form->field($data,'email')->email()->label('Email')->get() ?>

<?= $form->field($data,'no_hp')->input(['min' => 10],true)->label('No HP')->get() ?>