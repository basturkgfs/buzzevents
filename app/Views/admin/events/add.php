<div class="row">
  <div class="col-lg-11 col-lg-offset-1">
    <h1 class="page-header"><?= App::getInstance()->header; ?></h1>
  </div>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-9 col-lg-offset-1">
		<form method="post">
			<?= $form->input('nom', 'Nom de l\'évènement'); ?>
			<?= $form->input('description', 'Description de l\'évènement', ['type' => 'textarea']); ?>
			<?= $form->input('lieu', 'Lieu'); ?>
			<?= $form->input('ville', 'Ville'); ?>
			<?= $form->input('pays', 'Pays'); ?>
			<?= $form->select('type', 'Type de l\'évènement', $types); ?>
			<?= $form->input('date_debut', 'Date de début', ['type' => 'date']); ?>
			<?= $form->input('user_id', '', ['type' => 'hidden']); ?>
			<?= $form->submit('Sauvegarder l\'évènement'); ?>
		</form>		
	</div>
</div>
