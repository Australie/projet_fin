<?php
namespace EG\model;

use EG\Model\Manager;

class InscriptManager extends Manager
{

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
