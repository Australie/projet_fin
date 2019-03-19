<?php $title = 'Premier page';?>
<?php ob_start();?>
<?php while ($donnees = $Text->fetch()) {?>
<div class="col-sm-12 col-md-12 col-lg-12">

    <div class="centrageText col-sm-12 col-md-12  col-lg-12">
        <p><?=htmlspecialchars($donnees ["content"])?></p>
    </div>

</div>
<?php } ?>
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>