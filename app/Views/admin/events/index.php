<h1>Administrer les évènements</h1>

<p>
	<a href="?p=admin.events.add" class="btn btn-success">Ajouter un évènement</a>
</p>

<table class="table table-bordered table-hover">
	<thead>
		<td>ID</td>
		<td>Evènement</td>
		<td>Actions</td>
	</thead>
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?= $event->id ?></td>
		<td><?= $event->nom ?></td>
		<td>
			<a href="index.php?p=admin.events.edit&id=<?= $event->id ?>">Editer</a>
			<form action="?p=admin.events.delete" method="post" style="display: inline;">
				<input type="hidden" name="id" value="<?= $event->id; ?>">
				<button class="btn btn-danger">Supprimer</button>
			</form>
		</td>
	</tr>
	<?php endforeach ?>
</table>