<?php $title = 'book'; ?>
<?php  ob_start(); ?>
<h1></h1>



<?php
        while ($donnees = $chapters->fetch())
        {
        ?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['title']); ?>
        <em>le <?php echo $donnees['creation_date']; ?></em>
    </h3>

    <p>
        <?php
            echo nl2br(htmlspecialchars($donnees['content']));
            ?>
        <br />
        <em><a href="index.php?action=chapter&id=<?=($donnees['id'])?>">Commentaires</a></em>
    </p>
</div>
<?php
        }
        $chapters->closeCursor();
        ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>