<?php $title = 'Premier page';?>

<?php ob_start();?>




<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand navbar-link" href="index.php"><img src="img/3.jpg" alt="" height="45em" width="300em"/></a>
          <button
            class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#navcol-2"
          >
            <span class="sr-only">Toggle navigation</span
            ><span class="icon-bar"></span><span class="icon-bar"></span
            ><span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-2">
          <ul class="nav navbar-nav navbar-right">
            <li class="active" role="presentation">
              <a href="#"><img src="img/oFHyYSG.jpg" alt="exemple"height="40px" width="40px"/></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="col-sm-3 col-md-3 col-lg-3">
      <ul class="nav nav-pills nav-stacked">
        <li class="active , taille"><a href="#">Acceuil</a></li>
      </ul>
    </div>

    <div class="col-sm-9 col-md-9 col-lg-9">
      <h2>Livre suivie:</h2>
      <hr />
    </div>
    <div class="col-sm-9 col-xs-12 col-lg-9">
      <p>futurement implenter</p>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
      <ul class="nav nav-pills nav-stacked">
        <h3>abonement</h3>
        <li class="active, profile"><a href="#">First </a></li>
        <hr />
        <li class="profile"><a href="#">Second </a></li>
        <hr />
        <li class="profile"><a href="#">Third </a></li>
        <hr />
      </ul>
    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
        <h2>Recommmendations:</h2>
        <hr />
        <form class="navbar-form navbar-right inline-form">
                <div class="col-sm-12 col-md-12 col-lg-10">
                <input type="search" class="input-sm form-control" placeholder="Recherche">
                <button type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
      </div>

    <div class="col-sm-12 ">
        <div class="col-sm-10 col-md-10 col-lg-12" >
          <div class="col-sm 12 col-md-5 col-lg-3">
        <?=nl2br(htmlspecialchars($image['image']))?>  
                  height="250px"
                  width="185px"
               
           </div>
        <div class="col-sm-12 col-md-6 col-lg-9">
        <?=nl2br(htmlspecialchars($titre['titre']))?>
        <?=nl2br(htmlspecialchars($menber['id_membre']))?>
        <?=nl2br(htmlspecialchars($genre['id_genre']))?>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-9">
        <?=nl2br(htmlspecialchars($resu['resum']))?>
        </div>
        <hr />
       </div>
    </div>








<?php $content = ob_get_clean();?>

<?php require 'template.php';?>