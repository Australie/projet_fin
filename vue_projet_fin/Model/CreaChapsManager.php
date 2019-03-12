<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class CreaChapsManager extends Manager
{
    public function PostChaps($id,$title,$content,$numbre)
    {
        $db = $this->dbConnect();
        $Chaps = $db->prepare('INSERT INTO chapter (id,title, content, number, creation_date) 
        VALUES (?,?,?  NOW())');
        $Chaps->execute(array($id,$title,$content,$numbre));
        return $Chaps;
    }
}
