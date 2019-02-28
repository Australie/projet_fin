<?php

namespace EG\Model;

use \PDO;

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=bdd_projet_finv2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db; 
    }
}