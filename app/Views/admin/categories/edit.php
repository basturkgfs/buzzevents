<?php
if((isset($estEntier))&& ($estEntier== FALSE)){?>
<div class="alert alert-danger alert-dismissible col-sm-6 col-md-offset-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    V&eacute;rifiez que le prix et le nombre de places saisis sont corrects !!
</div>
<?php
}
?>
<div class="col-sm-6 col-md-offset-3">
    <form method="post">
    <?= $form->input('libelle_categorie', 'Libell&eacute; de la cat&eacute;gorie')  ;?>
    <?= $form->input('prix', 'Prix de la cat&eacute;gorie')  ;?>
    <?= $form->select('event_id', 'Evenements', $items)  ;?>
    <?= $form->input('nombre_place', 'Nombre de billets disponibles pour cette cat&eacute;gorie')  ;?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
</div>