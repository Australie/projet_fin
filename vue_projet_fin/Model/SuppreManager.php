<?php

namespace EG\model;

use \EG\Model\Manager;

class SuppreManager extends Manager
{
    public function suppreLivre($id)
    {
        $db = $this->dbConnect();
        $suppre = $db->prepare('DELETE FROM livre 
        WHERE id = ?');
        $suppre->execute(array(
            $id,
        ));

        return $suppre;
    }

    public function suppreComment($id)
    {
        $db = $this->dbConnect();
        $suppre = $db->prepare('DELETE FROM comment
        WHERE id = ?');
        $suppre->execute(array(
            $id,
        ));
     
        return $suppre;
    }
    public function supreChapite($id)
    {
        $db = $this->dbConnect();
        $suppre = $db->prepare('DELETE FROM chapter
        WHERE id = ?');
        $suppre->execute(array(
            $id,
        ));
     
        return $suppre;
    }
}
