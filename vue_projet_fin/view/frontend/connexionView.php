<?php $title = 'book';?>
<?php ob_start();?>

<form action="index.php?action=verifconexion" method="post">
    <div>
        <label for="pseudo"> votre pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="password"> votre motdepasse</label><br />
        <input type="text" id="password" name="password" />
    </div>
    <div>
        <input type="submit" />
    </div>


    <?php $content = ob_get_clean();?>
<?php require 'template.php';?>