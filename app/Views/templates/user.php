<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= App::getInstance()->title; ?></title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span>BuzzEvents</span>.net</a>
        <ul class="user-menu">
          <li class="dropdown pull-right">
            <a href="#" title="Notifications"><span class="glyphicon glyphicon-bell"></span>  <span class="badge badge-important">5</span></a>
            <a href="#" title="Messages"><span class="glyphicon glyphicon-comment"></span>  <span class="badge badge-warning">11</span></a>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
              
    </div><!-- /.container-fluid -->
  </nav>
    
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <!-- <form role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </form> -->
    <li role="presentation" class="divider"></li>
    <li role="presentation" class="divider"></li>
    <ul class="nav menu">
      <li class="active"><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span> Tableau de bord</a></li>
      <li class="parent ">
        <a href="#">
          <span class="glyphicon glyphicon-list"></span> Evènement <span data-toggle="collapse" href="#event" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
        </a>
        <ul class="children collapse" id="event">
          <li>
            <a class="" href="index.php?p=admin.events.add">
              <span class="glyphicon glyphicon-plus-sign"></span> Nouvel évènement
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-edit"></span> Editer évènement
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-remove-sign"></span> Supprimer évènement
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-list-alt"></span> Lister évènement
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-share-alt"></span> Brouillons 
              <span class="badge badge-important">11</span>
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-ok"></span> Evènement validé 
              <span class="badge badge-important">11</span>
            </a>
          </li>
        </ul>
      </li>
      <li><a href="widgets.html"><span class="glyphicon glyphicon-th"></span> Banque d'images</a></li>
      <li class="parent ">
        <a href="#">
          <span class="glyphicon glyphicon-list"></span> Catégories de Billets <span data-toggle="collapse" href="#category" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
        </a>
        <ul class="children collapse" id="category">
          <li>
            <a class="" href="index.php?p=admin.categories.add">
              <span class="glyphicon glyphicon-plus-sign"></span> Nouvelle catégorie
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-edit"></span> Editer catégorie
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-remove-sign"></span> Supprimer catégorie
            </a>
          </li>
          <li>
            <a class="" href="index.php?p=admin.categories.index">
              <span class="glyphicon glyphicon-list-alt"></span> Lister catégorie
            </a>
          </li>
        </ul>
      </li>
      <li class="parent ">
        <a href="#">
          <span class="glyphicon glyphicon-list"></span> Billeterie <span data-toggle="collapse" href="#ticket" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
        </a>
        <ul class="children collapse" id="ticket">
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-plus-sign"></span> Nouveau Billet
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-edit"></span> Editer billet
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-remove-sign"></span> Supprimer billet
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-list-alt"></span> Lister billet
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div><!--/.sidebar-->
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </div><!--/.row-->
    
    <?= $content; ?>
  </div>  <!--/.main-->

  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script> 
</body>

</html>
