<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class LivreManager extends Manager
{
   public function getLivres()
    {
        $db = $this->dbConnect();
        $Livres =  $db->prepare('SELECT * FROM livre ');
    
        return $Livres;
    }
}