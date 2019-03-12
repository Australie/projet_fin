<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class CreaChapsManager extends Manager
{
    public function PostChaps($title,$content,$id_Livre)
    {
        $db = $this->dbConnect();
        $Chaps = $db->prepare('INSERT INTO chapter (title, content, creation_date,id_Livre) 
        VALUES (?,?, NOW(), ?)');
        $Chaps->execute(array($title,$content,$id_Livre));
        return $Chaps;
    }
}
