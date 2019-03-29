<?php

namespace EG\Model;

use \PDO;

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=gretaxao_ehouarngargam;charset=utf8', 'gretaxao_ehouarngargam', 'Ehouarn2019', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db; 
    }
}