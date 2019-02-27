<?php $title = 'second page';?>

<?php ob_start();?>
<?php
        if(isset ($_SESSION['pseudo'])){
            ?>
          <h1> Livre de <?echo $_SESSION['pseudo'];?></h1>

       <?php } ?>

<?php while ($donnees = $Chapters->fetch()) {?>

    <p><?=$donnees['title']?></p>
    <p><?=$donnees['number']?></p>
    <p><?=$donnees['creation_date']?></p>
    
<?php }

$Chapters->closeCursor();?>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>