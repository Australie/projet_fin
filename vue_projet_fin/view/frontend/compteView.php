<?php $title = 'compte';?>

<?php ob_start();?>
<div class="slide">
<div class="content_slide"> 
<img  src="img/31.jpg" class="compte_slide" id="slider" alt="image slider">
</div> 
<div class="compte_name">
<?php
if (isset($_SESSION['pseudo'])) {

    echo htmlspecialchars($_SESSION['pseudo']);
}?>
    </div>
</div>
<div class="compte_nav">
        <ul >
          <li class="cn_perso"><a href="index.php?action=creationLivre">crée mon livre</a></li>
          
          <li class="cn_perso"><a href="index.php?action=creationLivre">crée ma nouvelle</a></li>
         
          <!--<li class=""><a href="index.php?action=creationLivre">crée ma BD</a></li>
   
          <li class=""><a href="index.php?action=creationLivre">crée mon Manga</a></li>
          -->
        </ul>
</div>
<section class="compte_zone">

  

    <?php while ($donnees = $Livre->fetch()) {?>
    <div class="compte_livre">
        <div class="compte_content">
            <div class="compte_img">
                <a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><img  src="img/<?=htmlspecialchars($donnees['image'])?>"
                    alt="<?=htmlspecialchars($donnees['titre'])?>"></a>
            </div>
            <div class="compte_info">
                <a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['titre'])?></a>
                <p><?=htmlspecialchars($donnees['libel'])?></p>
            </div>
            <div class="compte_resum">
                <p><?=htmlspecialchars($donnees['resum'])?></p>
            </div>
            <div class="compte_interact">
                <a href="index.php?action=redirectModifier&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre']) ?>">modifier</a>
                <a href="index.php?action=Supprimer&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre']) ?>">supprimer</a>
            </div>
        </div>
    </div>

    <?php }?>

</section>
<?php $Livre->closeCursor();
$content = ob_get_clean();?>

<?php require 'template.php';?>