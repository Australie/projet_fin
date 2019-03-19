<?php $title = 'Premier page';?>
<?php ob_start();?>

<div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <ul class="nav nav-pills nav-stacked">
        <li class=", active , taille"><a class="colorgeneral" href="index.php">Acceuil</a></li>
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

        <li class="active, profile"><a href="#">futurement implenter </a></li>
        <hr />
    </ul>
</div>


<div class="col-sm-9 col-md-9 col-lg-9">
    <h2>Recommmendations:</h2>
    <hr />
    <form class="navbar-form navbar-right inline-form">
        <div class="col-sm-12 col-md-12 col-lg-10">

        <select name="genre">
        <?php while ($donnees = $Genres->fetch()) { ?>
            <option value="<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees["libel"])?></option>
        <?php } ?>
        </select>
        <a href='./index.php'>Toute la liste</a>  
            <button type="submit" class="btn btn-primary btn-sm">
           <span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
    </form>
</div>
<div class="container">
    <div id="content" class="row">
        <?php while ($donnees = $Livres->fetch()) {?>
        <div class="padding col-sm-10 col-md-10 col-lg-12">
            <div class="col-sm-4 col-md-4 col-lg-3 ">
                <a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><img width="185" height="250"
                        src="img/<?=htmlspecialchars($donnees['image']) ?> " alt="<?=htmlspecialchars($donnees['titre'])?>"></a>
            </div>
            <div class="col-sm-2  col-md-4 col-lg-8">
                <p><a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['titre'])?></a></p>
                <p><a href="index.php?action=getChaps&id=<?=htmlspecialchars($donnees["id"])?>"><?=htmlspecialchars($donnees['pseudo'])?></a></p>
                <p><?=htmlspecialchars($donnees['libel'])?></p>
            </div>
            <div class="col-sm-9 col-md-5col-lg-3">
                <p><?=htmlspecialchars($donnees['resum'])?></p>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<div id="page_navigation"> </div>
</div>



<?php $Livres->closeCursor();
$content = ob_get_clean();?>

<?php require 'template.php';?>