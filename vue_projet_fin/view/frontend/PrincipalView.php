<?php $title = 'Premier page';?>

<?php ob_start();?>
<div class="col-sm-3 col-md-3 col-lg-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active , taille"><a href="index.php">Acceuil</a></li>
    </ul>
</div>

<div class="col-sm-9 col-md-9 col-lg-9">
    <h2>Livre suivie:</h2>
    <hr />
</div>
<div class="col-sm-9 col-xs-12 col-lg-9">
    <p>futurement implenter</p>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <ul class="nav nav-pills nav-stacked">
        <h3>abonement</h3>
   /teto/
        <li class="active, profile"><a href="#">First </a></li>
        <hr />
    </ul>
</div>
<div class="col-sm-9 col-md-9 col-lg-9">
    <h2>Recommmendations:</h2>
    <hr />
    <form class="navbar-form navbar-right inline-form">
        <div class="col-sm-12 col-md-12 col-lg-10">
            <input type="search" class="input-sm form-control" placeholder="Recherche">
            <button type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
    </form>
</div>
<?php while ($donnees = $Livres->fetch()) {?>
<div class="col-sm-10 col-md-10 col-lg-12">
    <div class="col-sm-4 col-md-4  col-lg-3 ">
        <a href="index.php?action=getChaps&id=<?=$donnees["id"]?>"> <img src="<?=$donnees['image']?>" alt="<?=$donnees['titre']?>"></a>
    </div>
    <div class="col-sm-2  col-md-4 col-lg-8">
        <p><a href="index.php?action=getChaps&id=<?=$donnees["id"]?>"><?=$donnees['titre']?></a></p>
        <p><a href="index.php?action=getChaps&id=<?=$donnees["id"]?>"><?=$donnees['pseudo']?></a></p>
        <p><?=$donnees['libel']?></p>
    </div>
    <div class="col-sm-9 col-md-5col-lg-3">
        <p><?=$donnees['resum']?></p>
    </div>
</div>

<?php }?>

</div>
<?php $Livres->closeCursor();
$content = ob_get_clean();?>

<?php require 'template.php';?>