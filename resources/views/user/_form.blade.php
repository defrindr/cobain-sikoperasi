
<?= $form->field($data,'nama')->input()->label('Nama')->get() ?>
<?= $form->field($data,'username')->input()->label('Username')->get() ?>
<?= $form->field($data,'password')->null()->password()->label('Password')->get() ?>
<?= $form->field($data,'password_confirmation')->null()->password()->label('Konfirmasi Password')->get() ?>
<?= $form->field($data,'role')->select(['administrator','operator'])->label('Role')->get() ?>