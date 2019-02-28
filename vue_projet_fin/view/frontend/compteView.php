<?php $title = 'compte';?>
 
<?php ob_start();?>
<?php
        if(isset ($_SESSION['pseudo'])){
           
          echo $_SESSION['pseudo'];

        } ?>

<form action="index.php?action=addInscription" method="post">

    <div>
        <label for="Titre">Titre</label><br />
        <input type="text" id="Titre" name="Titre" />
    </div>
    <div>
        <label for="resume">resumé</label><br />
        <input type="text" id="resume" name="resume" />
    </div>
    <div>
        <input type="submit" value="valider" />
    </div>
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>