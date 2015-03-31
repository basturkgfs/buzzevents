<?php
if((isset($estEntier))&& ($estEntier== FALSE)){?>
<div class="alert alert-danger">
    Veuillez entrer un prix correct!!
</div>
<?php
}
?>
<div class="col-sm-6 col-md-offset-3">
    <form method="post">
    <?= $form->input('libelle_categorie', 'Libell&eacute; de la cat&eacute;gorie')  ;?>
    <?= $form->input('prix', 'Prix de la cat&eacute;gorie')  ;?>
    <?= $form->select('event_id', 'Evenements', $items)  ;?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
</div>