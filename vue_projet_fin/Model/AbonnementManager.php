<?php

namespace EG\model;

use \EG\Model\Manager;
class AbonnementManager extends Manager
{
    public function getmembre()
    {
        $db = $this->dbConnect();
        $verif = $db->prepare('SELECT ');
        $verif->execute(array());

        return $verif->fetch();
    }

}