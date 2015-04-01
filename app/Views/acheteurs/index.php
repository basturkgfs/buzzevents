<div class="row">
    <h1 class="text-primary text-center"><em><?= $items[0]->evenements ; ?></em> : Payer son tiquet</h1>
    <div class="col-md-10 col-md-offset-1">
<table class="table">
    <thead>
        <tr>
            <td>Cat&eacute;gories</td>
            <td>Prix d'un tiquet </td>
            <td>Nombre de places par cat&eacute;gories</td>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($items as $category): ?>
        <tr>
            <td><?= $category->libelle_categorie ; ?></td>
            <td><?= $category->prix ; ?></td>
            <td>
              <form action="?p=admin.acheteurs.add" method="post">
                <div class="row">
                    <div class="col-md-7">
                        <input class="form-control" type="number" name="nombre_place" placeholder="Nombre de places" >
                    </div>    
                    <div class="col-md-5">
                        <input type="hidden" name="id" value="<?= $category->id;  ?>" >
                        <button class="btn btn-default">Ajouter</button>
                    </div>
                </div>
                </form>
            </td>
        </tr>
      <?php  endforeach; ?>
    </tbody>
</table> 
        <div class="row">
            <div class="col-md-8 col-md-offset-2" >
                <form method="post" class="well form-search">
                   <fieldset>
                   <legend>Informations sur le client</legend>
                    <?= $form->input('nom', 'Nom')  ;?>
                    <?= $form->input('prenom', 'Pr&eacute;nom')  ;?>
                    <?= $form->input('telephone', 'Contact')  ;?>
                    <?= $form->input('email', 'Adresse mail')  ;?>
                    <div class="text-right">
                    <?= $form->submit('Enregistrer et pr&eacute;visualiser les tiquets')  ;?>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



