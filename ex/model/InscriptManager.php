<?php
require_once("model/Manager.php");
 
class InscriptManager extends Manager
{

    public function addMember($pseudo,$password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO member(pseudo, password) VALUES(?, ?)');
        $req->execute(array(
           $pseudo,
           $password
        ));
        $req->closeCursor();

        return $req;
    }
}