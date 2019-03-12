<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class AffichelivreManager extends Manager
{
   public function getLivre()
    {
        $db = $this->dbConnect();
        $Livre =  $db->prepare('SELECT livre.id, titre, resum, image, id_membre, id_genre, M.pseudo, G.libel
        FROM livre 
        INNER JOIN membre M ON livre.id_membre = M.id 
        INNER JOIN genre G ON livre.id_genre = G.id
        WHERE M.id =?');
        $Livre->execute(array($_SESSION['member_id']));
        return $Livre;
    }
}