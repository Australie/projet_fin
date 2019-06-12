<?php $title = 'Premier page';?>
<?php ob_start();?>

<nav class="place_nav"> 
            <div class="nav">
                    <ul class="nav_boutoon">
                        <li class="nav_boutoon_choix"><a  href="index.php">Acceuil</a></li>
                        <?php if (!empty($_SESSION['member_id'])) {?>
                        <li class="nav_boutoon_choix"><a href="index.php?action=conexcompte&id">Mon compte</a></li>
                        <?php }?>
                    </ul>
            </div>
            <div >
                    <h2>abonement</h2>
                    <ul >
                        <li ><a href="#">futurement implenter </a></li>
                    </ul>
            </div>
</nav>
<main class="place_main">
    <section>
        <div class="">      
            <div >
                <h2>Livre suivie:</h2>
            </div>
            <div >
                <p>futurement implenter</p>
            </div>                   
            <div >
                <h2>Recommmendations:</h2>
                    <form >
                        <div class="genre_zone">
                            <select name="genre">
                                    <?php while ($donnees = $Genres->fetch()) {?>
                                    <option value="<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees["libel"])?>
                                    </option>
                                    <?php }?>
                            </select>
                            <a href='./index.php'>Toute la liste</a>
                            <button type="submit" class="place_bouton">
                            <span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
                    </form>
            </div>
                <div id="content" class="livre_zone">
                    <?php while ($donnees = $Livres->fetch()) {?>
                    <div class="livre_apart">
                        <div class="livre_content">
                            <div class="livre_image">
                                <a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><img class="livre_form" src="img/<?=htmlspecialchars($donnees['image'])?> "
                                        alt="<?=htmlspecialchars($donnees['titre'])?>"></a>
                            </div>
                            <div class="livre_info">
                                <p><a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['titre'])?></a></p>
                                <p><a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['pseudo'])?></a></p>
                                <p><?=htmlspecialchars($donnees['libel'])?></p>
                            </div>
                            <div class="livre_resum">
                                <p><?=htmlspecialchars($donnees['resum'])?></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            <div id="page_navigation"></div>
        </div>
    </section>
</main>
<footer class="place_footer">
    <p>@ehouarn gargam 2019 </p>   
</footer>
   
<?php $Livres->closeCursor();
$content = ob_get_clean();?>

<?php require 'template.php';?>