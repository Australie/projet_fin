<?php

namespace EG\model;

use \EG\Model\Manager;

class MemberManager extends Manager
{
    public function getMember($pseudo)
    {
        $db = $this->dbConnect();
        $verif = $db->prepare('SELECT id, pseudo, password , role FROM membre WHERE pseudo=(:nom)');
        $verif->execute(array(
            "nom" => $pseudo));

        return $verif->fetch();
    }


    public function addMember($pseudo, $password, $email)
    {

        //TODO on hash le password
        $PassHash = password_hash($password, PASSWORD_DEFAULT);

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membre(pseudo, password, email) VALUES(?, ?, ?)');
        $req->execute(array(
            $pseudo,
            $PassHash,
            $email,
        ));

        $req->closeCursor();

        return $req;
    }

}
