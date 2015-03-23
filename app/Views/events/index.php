<div class="row">
	<div class="col-sm-8">
		<?php foreach ($events as $event): ?>
			<h2><a href="<?= $event->getUrl(); ?>"><?= $event->nom; ?></a></h2>
			<p><em><?= $event->type; ?></em></p>
			<p><?= $event->description; ?></p>
		<?php endforeach ?>
	</div>

	<div class="col-sm-4">
		<ul>
		<?php foreach ($types as $type): ?>
			<li><a href="<?= $type->getUrl(); ?>"><?= $type->libelle_type_event; ?></a></li>
		<?php endforeach ?>
		</ul>
	</div>
</div>