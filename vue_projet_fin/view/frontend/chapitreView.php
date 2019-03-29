<?php $title = 'second page';?>
<?php ob_start();?>


<?php
use \EG\Controller\Controller;

if (isset($_SESSION['membre.id'])) {
    echo htmlspecialchars($_SESSION['membre.id']);
}?>
<?php htmlspecialchars($chapts = "");
htmlspecialchars($auteur = "");
?>

<div class="col-sm-10 col-md-10 col-lg-12">
    <div class=" col-sm-10 col-md-10 col-lg-12">
        <?php while ($donnees = $Chapters->fetch()) {?>
        <?php
    $chapts = $Chapters;
    $auteur = $donnees['id_membre'];
    ?>
    </div>
    <div class=" col-sm-10 col-md-10 col-lg-9">
        <a href="index.php?action=textView&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['title'])?></a>
        <p><?=htmlspecialchars($donnees['number'])?></p>
        <p><?=htmlspecialchars($donnees['creation_date'])?></p>

        <?php if (!empty(htmlspecialchars($_SESSION['member_id']) && (htmlspecialchars($donnees['id_membre']) == htmlspecialchars($_SESSION['member_id'])))) {?>
        <a href="index.php?action=supreChapite&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre'])?>">supprimer</a>
        <a href="index.php?action=redirectModifierlivre&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre'])?>">Modifier</a>
    </div>
</div>
<?php }?>
<?php }?>


<div class=" col-sm-10 col-md-10 col-lg-3">
    <?php
if (!empty(htmlspecialchars($_SESSION['member_id'])) && htmlspecialchars($Livre['id_membre'] == $_SESSION['member_id']) ) {?>
    <form action="index.php?action=ViewChaps&id=<?=$id?>&id_user<?=$donnees['id_membre']?>" method="post">
        <div>
            <label for="content">
                ajouter chapitre
            </label><br />
            <input type="submit" value="ajouter chapitre" />
        </div>
    </form>
    <?php }?>

</div>


<div class="col-sm-10 col-md-10 col-lg-12">
    <form action="index.php?action=addComment&id=<?=htmlspecialchars($id)?>&id_membre=<?=htmlspecialchars($_SESSION['member_id'])?>" method="post">
        <div>
            <label for="content">
                commentaires
            </label><br />
            <input type="text" id="content" name="content" />
            <input type="submit" value="valider" />
        </div>
    </form>
    <?php
while ($comment= $comments->fetch()) {
    ?>
    <p><strong><?=htmlspecialchars($comment['pseudo'])?></strong> le
        <?=htmlspecialchars($comment['creation_date'])?>
    </p>
    <p><?=nl2br(htmlspecialchars($comment['content']))?></p>


    <?php
if (Controller::isAdmin()) {?>
    <a href="index.php?action=suprecomment&id=<?=htmlspecialchars($comment['id'])?>&id_user<?=htmlspecialchars($donnees['id_membre'])?>">supprimer</a>
    <?php }?>
    <?php
}
?>
    <hr />
</div>
</div>
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>