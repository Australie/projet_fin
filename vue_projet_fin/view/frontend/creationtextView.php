<?php $title = 'book';?>
<?php ob_start();?>

<form action="index.php?action=creaChaps&id=<?=htmlspecialchars($idlivre) ?>" method="post">
<div class="formul_zone" >   
    <div>
        <input type="submit" />
    </div>
    <div>
        <label for="Titre">Titre Chapitre</label><br />
        <TEXTAREA type="text" id="titre" name="titre" >le titre</TEXTAREA>
    </div>
    <div>
        <label for="content">text</label><br />
        <TEXTAREA  type="text" id="content" name="content">taper votre texte</TEXTAREA> 
</div>
    <?php $content = ob_get_clean();?>
    <?php require 'template.php';?>