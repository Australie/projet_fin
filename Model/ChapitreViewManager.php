<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class ChapitreViewManager extends Manager
{
    public function getChaps($id)
    {
        $db = $this->dbConnect();
        $Chapters = $db->prepare('SELECT * FROM chapter 
        WHERE id_Livre = ?');
        $Chapters->execute(array($id));
        return $Chapters;
    }
}
