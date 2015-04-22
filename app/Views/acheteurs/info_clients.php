<div class="row">
<!--   Debut Menu de gauche     -->
        <div class="col-md-3"> 
          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="index.php?p=acheteurs.info_clients&id=<?php echo $_GET['id']?>">Informations sur le client<span class="pull-right"><i class="glyphicon glyphicon-refresh"></i></span></a></li>
              <li><a href="index.php?p=acheteurs.reservations&id=<?php echo $_GET['id']?>">R&eacute;servation de places <span class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i></span></a></li>
              <li><a href="SupprimerCategorie.php">Pr&eacute;visualiser les tickets<span class="pull-right"><i class="glyphicon glyphicon-minus-sign"></i></span></a></li>
              <li><a href="ListeCategorie.php">Paiement des tickets<span class="pull-right"><i class="glyphicon glyphicon-th-list"></i></span></a></li>
          </ul>
            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                20%
              </div>
            </div>
        </div>
<!--   Fin Menu de gauche     -->
        <!--<div class="row">-->
            <div class="col-md-9 " >
                <form action="index.php?p=acheteurs.info_clients&id=<?php echo $_GET['id']?>" method="post" class="well form-search">
                   <fieldset>
                       <legend>Informations sur le client</legend>
                        <?= $form->input('nom', 'Nom')  ;?>
                        <?= $form->input('prenom', 'Pr&eacute;nom')  ;?>
                        <?= $form->input('telephone', 'Contact')  ;?>
                        <?= $form->input('email', 'Adresse mail')  ;?>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Suivant</button>
                    </div>
                    </fieldset>
                </form>
            </div>
        <!--</div>-->
</div>