<?php
namespace EG\model;

use EG\model\Manager;

class InscriptManager extends Manager
{

    public function addMember($pseudo, $password)
    {

        //TODO on hash le password
        $PassHash = password_hash($password, PASSWORD_DEFAULT);

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO member(pseudo, password) VALUES(?, ?)');
        $req->execute(array(
            $pseudo,
            $PassHash,
        ));

        $req->closeCursor();

        return $req;
    }

}
