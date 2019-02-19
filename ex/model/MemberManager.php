<?php

namespace EG\model;

use EG\model\Manager;

class MemberManager extends Manager
{
    public function getMember($pseudo)
    {
        $db = $this->dbConnect();
        $verif = $db->prepare('SELECT * FROM member WHERE pseudo=(:nom)');
        $verif->execute(array( "nom" => $pseudo ));

        return $verif->fetch();
    }
}
