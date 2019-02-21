<?php $title = 'book';?>
<?php ob_start();?>

<form action="index.php?action=addInscription" method="post">
    <div>
        <label for="pseudo">Inscirvez votre pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="password">Inscirvez votre motdepasse</label><br />
        <input type="text" id="password" name="password" />
    </div>
    <div>
    <input type="submit" value="valider" />
    </div>


    <?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>