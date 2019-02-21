<?php
require "vendor/autoload.php";

use EG\controller\App;

$app = new App();
$app->run();

session_start();

//TODO sessions
