<?php if($errors){  ?>
<div class="alert alert-danger alert-dismissible col-sm-6 col-md-offset-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    Identifiants incorrects
</div>
<?php } ?>


<div class="col-sm-6 col-md-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">Formulaire d'authentification</div>
    <div class="panel-body">
<form method="post">
    <?= $form->input('username', 'Pseudo')  ;?>
    <?= $form->input('password', 'Mot de passe',['type' => 'password'])  ;?>
    <button class="btn btn-primary">Connexion</button>
</form>
  </div>  
</div>    
</div>