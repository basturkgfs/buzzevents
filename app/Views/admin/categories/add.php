<form method="post">
	<?= $form->input('libelle_categorie', 'Nom de la catégorie'); ?>
	<?= $form->input('prix', 'Prix', ['type' => 'numeric']); ?>
	<?= $form->input('event_id', '', ['type' => 'hidden']); ?>
	<?= $form->submit('Sauvegarder l\'évènement'); ?>
</form>