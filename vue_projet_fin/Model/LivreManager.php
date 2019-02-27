<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class LivreManager extends Manager
{
   public function getLivres()
    {
        $db = $this->dbConnect();
        $Livres =  $db->query('SELECT * FROM livre 
        INNER JOIN membre ON livre.id_membre = membre.id 
        INNER JOIN genre ON livre.id_genre = genre.id ');
        
        return $Livres;
    }
}