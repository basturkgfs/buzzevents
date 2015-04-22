<h1 class="text-primary text-center"><em><?= $items[0]->evenements ; ?></em> </h1>
    <hr />
    <?php 
        if(isset($_GET['p'])){
            if($_GET['p']== 'info_clients'){
                require 'info_clients.php';
            }
        }else {
            require 'reservations.php';
        } 
        ?>




