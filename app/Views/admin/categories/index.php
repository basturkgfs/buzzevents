<h1>Administrer les catégories des billets</h1>

<p>
	<a href="?p=admin.categories.add" class="btn btn-success">Ajouter une catégorie</a>
</p>

<table class="table table-bordered table-hover">
	<thead>
		<td>ID</td>
		<td>Catégorie</td>
		<td>Actions</td>
	</thead>
	<?php foreach ($categories as $categorie): ?>
	<tr>
		<td><?= $categorie->id ?></td>
		<td><?= $categorie->libelle_categorie ?></td>
		<td>
			<a href="index.php?p=admin.categories.edit&id=<?= $categorie->id ?>">Editer</a>
			<form action="?p=admin.categories.delete" method="post" style="display: inline;">
				<input type="hidden" name="id" value="<?= $categorie->id; ?>">
				<button class="btn btn-danger">Supprimer</button>
			</form>
		</td>
	</tr>
	<?php endforeach ?>
</table>