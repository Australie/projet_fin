<?php $title = 'book';?>
<?php ob_start();?>
<form action="index.php?action=addInscription" method="post">
    <div class="col-lg-12 col-lg-offset-5">
        <div>
            <label for="pseudo">Inscirvez votre pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" />
            <span id='misspseudo'></span><br>
        </div>
        <div>
            <label for="password">Inscirvez votre motdepasse</label><br />
            <input type="password" id="password" name="password" />
            <span id='misspassword'></span><br>
        </div>
        <div>
            <label for="email">Inscirvez votre email</label><br />
            <input type="email" id="email" name="email" />
            <span id='missemail'></span><br>
        </div>
        <div>
            <input type="submit" value="valider" id='bouton_envoi'/>
        </div>
        <div>
            <a href="index.php">Acceuil</a>
        </div>
    </div>

    <?php $content = ob_get_clean();?>
    <?php require 'template.php';?>