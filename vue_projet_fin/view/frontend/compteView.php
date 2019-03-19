<?php $title = 'compte';?>

<?php ob_start();?>
<div class=" container col-sm-12 col-md-12 col-lg-12">
    <img src="img/312.jpg" alt="gally" width="100%" height="300em">
    <div class="bottom-left">
<?php
if (isset($_SESSION['pseudo'])) {

    echo htmlspecialchars($_SESSION['pseudo']);
}?>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">

    <ul class="nav nav-pills nav-stacked">
        <li class="active, profile"><a href="index.php?action=creationLivre">crée mon livre</a></li>
        <hr />
   
    </ul>

</div>

<?php while ($donnees = $Livre->fetch()) {?>
<div class=" col-sm-10 col-md-10 col-lg-offset-3">
    <div class=" padding col-sm-10 col-md-10 col-lg-12">
        <div class="col-sm-4 col-md-4  col-lg-3 ">
            <a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><img width="185" height="250" src="img/<?=htmlspecialchars($donnees['image'])?>"
                    alt="<?=htmlspecialchars($donnees['titre'])?>"></a>
        </div>
        <div class="col-sm-2  col-md-4 col-lg-8">
            <a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['titre'])?></a>
            <p><?=htmlspecialchars($donnees['libel'])?></p>
        </div>
        <div class="col-sm-9 col-md-5col-lg-4">
            <p><?=htmlspecialchars($donnees['resum'])?></p>
        </div>
        <div class="col-sm-9 col-md-5col-lg-3">
            <a href="index.php?action=redirectModifier&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre']) ?>">modifier</a>
            <a href="index.php?action=Supprimer&id=<?=htmlspecialchars($donnees["id"])?>&id_user<?=htmlspecialchars($donnees['id_membre']) ?>">supprimer</a>
        </div>
    </div>
</div>

<?php }?>

</div>
<?php $Livre->closeCursor();
$content = ob_get_clean();?>

<?php require 'template.php';?>