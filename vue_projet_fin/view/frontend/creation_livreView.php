<?php $title = 'compte';?>

<?php ob_start();?>
<form action="index.php?action=creaLivre" method="post">
   <div class="col-lg-12 col-lg-offset-5" >
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

        <select name="genre">
        <?php while ($donnees= $Genres->fetch()) { ?>
            <option value="<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees["libel"])?></option>
   
        <?php } ?>
        </select>
    </div>
    <div>
        <input type="submit" value="valider" name="envoyer" />
    </div>
    </div>
    <?php $Genres->closeCursor();?>
    <?php $content = ob_get_clean();?>

    <?php require 'template.php';?>