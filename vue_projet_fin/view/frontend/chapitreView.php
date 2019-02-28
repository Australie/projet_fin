<?php $title = 'second page';?>
<?php ob_start();?>

<?php
if (isset($_SESSION['pseudo'])) {
    ?>

    <?php
      echo $_SESSION['pseudo'];?>


<?php }?>

<?php while ($donnees = $Chapters->fetch()) {?>

<p><?=$donnees['title']?></p>
<p><?=$donnees['number']?></p>
<p><?=$donnees['creation_date']?></p>

<?php } ?>


<?php
while ($comment = $comments->fetch()) {
    ?>
<p><strong><?=htmlspecialchars($comment['pseudo'])?></strong> le <?=htmlspecialchars($comment['creation_date'])?>
</p>
<p><?=nl2br(htmlspecialchars($comment['content']))?></p>

<?php
}
?>

<form action="index.php?action=addComment" method="post">
    <div>
        <label for="commentaires"> commentaires </label><br />
        <input type="text" id="commentaires" name="commentaires" />
    </div>
    <div>
        <input type="submit" value="valider" />
    </div>
</form>


<?php $Chapters->closeCursor();?>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>