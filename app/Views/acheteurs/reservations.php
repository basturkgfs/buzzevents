<?= var_dump($_SESSION['acheteur']);  ?>
      <?php $i = 0;
      foreach ($items as $category): 
        $libelle[$i] = $category->libelle_categorie;
        $prix[$i] = $category->prix;
        $id[$i] = $category->id;
        $i++;
      endforeach; ?>
<div class="row">
<!--   Debut Menu de gauche     -->
        <div class="col-md-3"> 
          <ul class="nav nav-pills nav-stacked">
              <li><a href="index.php?p=acheteurs.reservations&id=<?php echo $_GET['id']?>">Informations sur le client<span class="pull-right"><i class="glyphicon glyphicon-refresh"></i></span></a></li>
              <li class="active"><a href="index.php?p=acheteurs.index&id=<?php echo $_GET['id']?>">R&eacute;servation de places <span class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i></span></a></li>
              <li><a href="SupprimerCategorie.php">Pr&eacute;visualiser les tickets<span class="pull-right"><i class="glyphicon glyphicon-minus-sign"></i></span></a></li>
              <li><a href="ListeCategorie.php">Paiement des tickets<span class="pull-right"><i class="glyphicon glyphicon-th-list"></i></span></a></li>
          </ul>
            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                65%
              </div>
            </div>
        </div>
<!--   Fin Menu de gauche     -->
    <div class="col-md-5">
<table class="table">
    <thead>
        <tr>
            <td>Cat&eacute;gories</td>
            <td>Prix d'un ticket </td>
        </tr>
    </thead>
        <tbody>
            <div class="row">
            <div class="col-md-4">
                <?php 
                    for($j = 0; $j<= $i-1; $j++){
                        echo '<tr><td><p>'.$libelle[$j].'</p></td>';
                        echo '<td><p>'.$prix[$j].'</p></td> </tr>';
                    }
                ?>
            </div>
            </div>
        </tbody>
</table>
    </div>

        <div class="col-md-4">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nombre de places </td>
                    </tr>
                </thead>
                <tbody>
                <form action="index.php?p=acheteurs.reservations&id=<?= $_GET['id']?>" method="post">
                        <?php
                            for($k = 0; $k<= $i-1; $k++){ ?>
            <tr>
                <td>
                               <div class="col-md-12">
                                    <input class="form-control" required="" type="number" min="0" max="<?= $category->nombre_place;  ?>" name="<?= $k ;?>" placeholder="Nombre de places" value="<?php echo (isset($_SESSION['nombre_place'.$k])) ? $_SESSION['nombre_place'.$k] : NULL;  ?>">
                                    <input type="hidden" name="<?= $libelle[$k];  ?>" value="<?= $id[$k];  ?>" >
                                    <input type="hidden" name="acheteur" value="<?php if(isset($_SESSION['acheteur'])) echo $_SESSION['acheteur'] ;  ?>" >
                                    <input type="hidden" name="event" value="<?= $_GET['id'];  ?>" >
                                    <input type="hidden" name="categorie" value="<?= $libelle[$k];  ?>" >
                               </div>
                </td>
            </tr>
                         <?php }
                        ?>
            <div class="text-right">
                        <a class="btn btn-success" href="index.php?p=acheteurs.info_clients&id=<?php echo $_GET['id']?>">Pr&eacute;c&eacute;dent</a>
                        <button class="btn btn-primary" type="submit">Suivant</button>
            </div>
                    </form>
                </tbody>  
            </table>
        </div>
</div>