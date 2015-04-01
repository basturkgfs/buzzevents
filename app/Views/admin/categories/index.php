<h1>Administrer les cat&eacute;gories</h1>
<p>
    <a href="?p=admin.categories.add" class="btn btn-success" >Ajouter</a>
</p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Cat&eacute;gories</td>
            <td>Prix</td>
            <td>Ev&egrave;nements</td>
            <td>Billets disponibles</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($items as $category): ?>
        <tr>
            <td><?= $category->id ; ?></td>
            <td><?= $category->libelle_categorie ; ?></td>
            <td><?= $category->prix ; ?></td>
            <td><?= $category->evenements ; ?></td>
            <td><?= $category->nombre_place ; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id ; ?>">Editer</a>
                <form action="?p=admin.categories.delete" style="display: inline" method="post">
                    <input type="hidden" name="id" value="<?= $category->id;  ?>">
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
      <?php  endforeach; ?>
    </tbody>
</table>

