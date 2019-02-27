<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/bootstrap/css/styles.css" />
  </head>

  <body>
  <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand navbar-link" href="index.php"><img src="img/3.jpg" alt="" height="45em" width="300em"/></a>


          <button
            class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#navcol-2"
          >
            <span class="sr-only">Toggle navigation</span
            ><span class="icon-bar"></span><span class="icon-bar"></span
            ><span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-2">
          <ul class="nav navbar-nav navbar-right">
          <div class="btn-group">
          <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="img/1.jpg" alt="exemple"height="40px" width="40px"/>
          </button>
       <div class="dropdown-menu dropdown-menu-right">
       <a href="index.php?action=inscription"><img src="img/1.jpg" alt="exemple"height="40px" width="40px"/></a>
       <button class="dropdown-item" type="button">s'inscrire</button>
       <button class="dropdown-item" type="button">Deconexion</button>


     </div>
</div>
            
        </div>
      </div>
    </nav>


      <?=$content?>
  </body>
  <script src="assets/bootstrap/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</html>
