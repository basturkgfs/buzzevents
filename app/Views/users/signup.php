<form method="post">
	<?= $form->input('login', 'Pseudo'); ?>
	<?= $form->input('email', 'Email'); ?>
	<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	<?= $form->input('password2', 'Confirmez', ['type' => 'password']); ?>
	<?= $form->submit('Valider'); ?>
</form>