<?php $title = 'book';?>
<?php ob_start();?>

<form action="index.php?action=Modifierliver&id=<?=htmlspecialchars($id) ?>" method="post">
    <div class="">
        <div>
            <input type="submit" />
        </div>
        <div>
            <label for="title">Titre Chapitre</label><br />
            <TEXTAREA type="text" id="title" name="title">le titre</TEXTAREA>
        </div>
        <div>
            <label for="content">text</label><br />
            <TEXTAREA type="text" id="content" name="content">taper votre texte</TEXTAREA>
        </div>
        <?php $content = ob_get_clean();?>
        <?php require 'template.php';?>