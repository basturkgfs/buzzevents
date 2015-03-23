<form method="post">
	<?= $form->input('nom', 'Nom de l\'évènement'); ?>
	<?= $form->input('description', 'Description de l\'évènement', ['type' => 'textarea']); ?>
	<?= $form->input('lieu', 'Lieu'); ?>
	<?= $form->input('ville', 'Ville'); ?>
	<?= $form->input('pays', 'Pays'); ?>
	<?= $form->select('type', 'Type de l\'évènement', $types); ?>
	<?= $form->input('date_debut', 'Date de début', ['type' => 'date']); ?>
	<?= $form->submit('Sauvegarder l\'évènement'); ?>
</form>