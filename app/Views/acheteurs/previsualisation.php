<div class="row">
<!--   Debut Menu de gauche     -->
        <div class="col-md-3"> 
          <ul class="nav nav-pills nav-stacked">
              <li><a href="index.php?p=acheteurs.reservations&id=<?php echo $_GET['id']?>">Informations sur le client<span class="pull-right"><i class="glyphicon glyphicon-refresh"></i></span></a></li>
              <li><a href="index.php?p=acheteurs.index&id=<?php echo $_GET['id']?>">R&eacute;servation de places <span class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i></span></a></li>
              <li class="active"><a href="#">Pr&eacute;visualiser les tickets<span class="pull-right"><i class="glyphicon glyphicon-minus-sign"></i></span></a></li>
              <li><a href="ListeCategorie.php">Paiement des tickets<span class="pull-right"><i class="glyphicon glyphicon-th-list"></i></span></a></li>
          </ul>
            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                80%
              </div>
            </div>
        </div>
<!--   Fin Menu de gauche     -->
    <div class="col-md-9"> 
        <h3 class="text-center">Pr&eacute;visualiser les billets avant de proc&eacute;der au paiement</h3>
        <div class="text-right">
        <a class="btn btn-info" href="#">Payez vos tickets maintenant</a>
        </div>
    </div>
        
</div>