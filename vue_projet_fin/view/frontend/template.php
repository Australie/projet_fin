<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/normalize.css" />
</head>

<body>
<header class="place_header">           
            <div >
                 <a  href="index.php"><img src="img/4.png" class="logo" alt="logo"/></a>
            </div>      
            <div class="dropdown">
                <button class="boutonmenuprincipal" type="button">
                    <img src="img/icon.png" alt="exemple"  />
                </button>
                    <ul class="dropdown-child">
                        <li ><a href="index.php?action=inscription">inscription</a></li>
                        <li ><a href="index.php?action=conexion">connexion</a></li>
                        <?php if (!empty($_SESSION['member_id'])) {?>
                        <li ><a href="index.php?action=conexcompte&id">Mon compte</a></li>
                        <li ><a href="index.php?action=decocompte">Deconexion</a></li>
                        <?php }?>
                        </ul>
             </div> 
    </header>
    <main class="All_content">
        <?=$content?>

<script src="js/jquery.min.js"></script>
<script src="js/alert_comment.js"></script>
<script src="js/liste_contenue.js"></script>
<script src="js/alert.js"></script>
<script src="js/slide.js"></script>
</body>
</html>