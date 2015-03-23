<form method="post">
	<?= $form->input('email', 'Email'); ?>
	<?= $form->input('login', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de passe'); ?>
	<?= $form->input('password2', 'Confirmez'); ?>
	<?= $form->submit('Valider'); ?>
</form>