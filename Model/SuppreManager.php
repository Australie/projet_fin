<?php

namespace EG\model;

use EG\Model\Manager;

class SuppreManager extends Manager
{
    public function SuppreLivre()
    {
        $db = $this->dbConnect();
        $suppre = $db->prepare('DELETE FROM livre 
        WHERE id = ?');
        $suppre->execute(array());

        return $suppre->fetch();
    }
}
