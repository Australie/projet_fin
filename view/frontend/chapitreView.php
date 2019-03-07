<?php $title = 'second page';?>
<?php ob_start();?>

<?php
if (isset($_SESSION['pseudo'])) {
    ?>

<?php
echo $_SESSION['pseudo']; ?>


<?php }?>
<?php $chapts = "";?>
<?php while ($donnees = $Chapters->fetch()) {?>
<?php $chapts = $Chapters;?>
<p><?=$donnees['title']?></p>
<p><?=$donnees['number']?></p>
<p><?=$donnees['creation_date']?></p>


<?php }?>


<form action="index.php?action=addComment&id=<?= $id ?>&id_membre=<?= $_SESSION['member_id']?>" method="post">
    <div>
        <label for="content">
            commentaires
        </label><br />
        <input type="text" id="content" name="content" />
        <input type="submit" value="valider" />
    </div>
</form>

<?php
while ($comment = $comments->fetch()) {
    ?>
<p><strong><?=htmlspecialchars($comment['pseudo'])?></strong> le <?=htmlspecialchars($comment['creation_date'])?>
</p>
<p><?=nl2br(htmlspecialchars($comment['content']))?></p>

<?php
}
?>





<?php $content = ob_get_clean();?>

<?php require 'template.php';?>