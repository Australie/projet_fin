<?php $title = 'compte';?>

<?php ob_start();?>
<div class=" container col-sm-12 col-md-12 col-lg-12">
    <img src="img/4.png" alt="gally" width="1700em" height="300em">
    <div class="bottom-right">
        <?php
if (isset($_SESSION['pseudo'])) {

    echo $_SESSION['pseudo'];

}?>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">

    <ul class="nav nav-pills nav-stacked">
        <li class="active, profile"><a href="index.php?action=creationLivre">crée mon livre</a></li>
        <hr />

        <li class="active, profile"><a href="index.php?action=Text">crée Text </a></li>
        <hr />
        <li class="active, profile"><a href="#">First </a></li>
        <hr />
    </ul>

</div>
<?php while ($donnees = $Livre->fetch()) {?>
<div class="col-sm-10 col-md-10 col-lg-9">
    <div class="col-sm-4 col-md-4  col-lg-3 ">
        <a href="index.php?action=getChaps&id=<?=$donnees["id"]?>"> <img src="img/<?=$donnees['image']?>" alt="<?=$donnees['titre']?>"></a>
    </div>
    <div class="col-sm-2  col-md-4 col-lg-8">
        <p><a href="index.php?action=getChaps&id=<?=$donnees["id"]?>"><?=$donnees['titre']?></a></p>
        <p><a href="index.php?action=getChaps&id=<?=$donnees["id"]?>"><?=$donnees['pseudo']?></a></p>
        <p><?=$donnees['libel']?></p>
    </div>
    <div class="col-sm-9 col-md-5col-lg-4">
        <p><?=$donnees['resum']?></p>
    </div>
    <div class="col-sm-9 col-md-5col-lg-3">
    <a href="index.php?action=Supprimer">supprimer</a>
    </div>
</div>

<?php }?>

<?php $Livre->closeCursor();
 $content = ob_get_clean();?>

<?php require 'template.php';?>