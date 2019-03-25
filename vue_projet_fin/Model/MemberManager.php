<?php

namespace EG\model;

use EG\Model\Manager;

class MemberManager extends Manager
{
    public function getMember($pseudo)
    {
        $db = $this->dbConnect();
        $verif = $db->prepare('SELECT * FROM membre WHERE pseudo=(:nom)');
        $verif->execute(array("nom" => $pseudo));

        return $verif->fetch();
    }
}
