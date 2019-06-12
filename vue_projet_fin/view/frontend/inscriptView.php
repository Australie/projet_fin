<?php $title = 'book';?>
<?php ob_start();?>
<form action="index.php?action=addInscription" method="post">
    <section class="formul_zone">
        <article>
            <label for="pseudo">Inscirvez votre pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" />
            <span id='misspseudo'></span><br>
        </article>
        <article>
            <label for="password">Inscirvez votre motdepasse</label><br />
            <input type="password" id="password" name="password" />
            <span id='misspassword'></span><br>
            <p>Attention le mot de pass doit contenir au moins 5 lettre et 2 chiffre pour fonctionné</p>
        </article>
        <article>
            <label for="email">Inscirvez votre email</label><br />
            <input type="email" id="email" name="email" />
            <span id='missemail'></span><br>
        </article>
        <article>
            <input type="submit" value="valider" id='bouton_envoi'/>
        </article>
        <article>
            <a href="index.php">Acceuil</a>
        </article>
</section>

    <?php $content = ob_get_clean();?>
    <?php require 'template.php';?>