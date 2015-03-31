<div class="row">
  <div class="col-lg-11 col-sm-offset-1">
    <h1 class="page-header"><?= App::getInstance()->header; ?></h1>
  </div>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
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
	</div>
</div>