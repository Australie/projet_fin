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

<section class="">
    <article class="" >
        <?php while ($donnees = $Chapters->fetch()) {?>
        <?php
        $chapts = $Chapters;
        $auteur = $donnees['id_membre'];
    ?>
    </article>
    <article class="">
        <a href="index.php?action=textView&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['title'])?></a>
        <p><?=htmlspecialchars($donnees['number'])?></p>
        <p><?=htmlspecialchars($donnees['creation_date'])?></p>

        <?php if (!empty(htmlspecialchars($_SESSION['member_id']) && (htmlspecialchars($donnees['id_membre']) == htmlspecialchars($_SESSION['member_id'])))) {?>
        <a href="index.php?action=supreChapite&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre'])?>">supprimer</a>
        <a href="index.php?action=redirectModifierlivre&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre'])?>">Modifier</a>
    </article>
</section>
<?php }?>
<?php }?>


<section class="">
    <?php
    if (!empty(htmlspecialchars($_SESSION['member_id'])) && htmlspecialchars($Livre['id_membre'] == $_SESSION['member_id']) ) {?>
        <form action="index.php?action=ViewChaps&id=<?=$id?>&id_user<?=$donnees['id_membre']?>" method="post">
            <article>
                <p>
                  ajouter chapitre :
                </p>
                <input type="submit" value="ajouter chapitre" />
            </article>
        </form>
    <?php }?>

</section>


<section class="">
    <form action="index.php?action=addComment&id=<?=htmlspecialchars($id)?>&id_membre=<?=htmlspecialchars($_SESSION['member_id'])?>" method="post">
        <article class="">
            <p >
                commentaires :
            </p>
            <input type="text" id="content" name="content" />
            <input type="submit" value="valider" />
        </article>
    </form>
    <?php
    while ($comment= $comments->fetch()) {
     ?>
        <p><strong><?=htmlspecialchars($comment['pseudo'])?></strong> le
           <?=htmlspecialchars($comment['creation_date'])?>
        </p>
        <p><?=nl2br(htmlspecialchars($comment['content']))?>
        </p>

        <?php
        if (Controller::isAdmin()) {?>
           <a href="index.php?action=suprecomment&id=<?=htmlspecialchars($comment['id'])?>&id_user<?=htmlspecialchars($donnees['id_membre'])?>">supprimer</a>
        <?php }?>
        <?php
    }
    ?>
</section>
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>