<?php $title = 'compte';?>

<?php ob_start();?>
<div class=" container col-sm-12 col-md-12 col-lg-12">
    <img src="img/4.png" alt="gally" width="1700em" height="300em">
    <div class="bottom-right">
    <?php
        if(isset ($_SESSION['pseudo'])){
           
          echo $_SESSION['pseudo'];

        } ?>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active, profile"><a href="#">First </a></li>
        <hr />

        <li class="active, profile"><a href="#">First </a></li>
        <hr />
        <li class="active, profile"><a href="#">First </a></li>
        <hr />
    </ul>
</div>

<div class="col-sm-12 col-md-12 col-lg-9">
    <p>Mes Livres:</p>
</div>

<!--<form action="index.php?action=addInscription" method="post">

    <div>
        <label for="Titre">Titre</label><br />
        <input type="text" id="Titre" name="Titre" />
    </div>
    <div>
        <label for="resume">resumé</label><br />
        <input type="text" id="resume" name="resume" />
    </div>
    <div>
        <label for="image">image</label><br />
        <input type="file" id="image" name="image" />
    </div>
     <div>
        <label for="genre">genre</label><br />
        <input type="text" id="genre" name="genre" />
    </div>
    <div>
        <input type="submit" value="valider" />
    </div> -->
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>