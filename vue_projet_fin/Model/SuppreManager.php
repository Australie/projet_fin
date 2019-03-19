<?php

namespace EG\model;

use \EG\Model\Manager;

class SuppreManager extends Manager
{
    public function SuppreLivre($id)
    {
        $db = $this->dbConnect();
        $suppre = $db->prepare('DELETE FROM livre 
        WHERE id = ?');
        $suppre->execute(array(
            $id,
        ));

        return $suppre;
    }

    public function Supprecomment($id)
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
