<?php $title = 'Premier page';?>
<?php ob_start();?>
<?php while ($donnees = $Text->fetch()) {?>
<div class="">

    <div class="">
        <p><?=htmlspecialchars($donnees ["content"])?></p>
    </div>

</div>
<?php } ?>
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>