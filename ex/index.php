<?php
//appelle App 
require('controller/App.php');


$app = new App(); 
$app->run();

session_start();

//TODO sessions 