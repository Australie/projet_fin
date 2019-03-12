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
<a href="index.php?action=supreChapite&id=<?=$donnees["id"]?>">supprimer</a>
<a href="index.php?action=redirectModifierlivre&id=<?=$donnees["id"]?>">Modifier</a>


<?php }?>
<div>
    <form action="index.php?action=ViewChaps&id=<?= $id ?>" method="post">
        <div>
            <label for="content">
                ajouter chapitre
            </label><br />
            <input type="submit" value="ajouter chapitre" />
        </div>
    </form>
</div>


<div>
    <form action="index.php?action=addComment&id=<?= $id ?>&id_membre=<?= $_SESSION['member_id']?>" method="post">
        <div>
            <label for="content">
                commentaires
            </label><br />
            <input type="text" id="content" name="content" />
            <input type="submit" value="valider" />
        </div>
    </form>
</div>
<?php
while ($comment = $comments->fetch()) {
    ?>
<p><strong><?=htmlspecialchars($comment['pseudo'])?></strong> le <?=htmlspecialchars($comment['creation_date'])?>
</p>
<p><?=nl2br(htmlspecialchars($comment['content']))?></p>
<a href="index.php?action=suprecomment&id=<?=$comment['id']?>">supprimer</a>

<?php
}
?>





<?php $content = ob_get_clean();?>

<?php require 'template.php';?>