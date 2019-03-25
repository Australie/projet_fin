<?php
session_start();
require "vendor/autoload.php";

use EG\Controller\App;

$app = new App();
$app->run();

