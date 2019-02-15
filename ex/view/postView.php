<?php $title = 'booke'; ?>
<?php  ob_start(); ?>

<p><a href="/">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($chapter['title']) ?>
        <em>le <?= $chapter['creation_date'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($chapter['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>
<?php
        while ($comment = $comments->fetch())
        {
            ?>
<p><strong><?= htmlspecialchars($comment['id_member']) ?></strong> le <?= htmlspecialchars($comment['creation_date']) ?>
</p>
<p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
<?php
        }
        ?>

<form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="content">Commentaire</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>

</form>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>