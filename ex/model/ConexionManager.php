<?php
require_once("model/Manager.php");
 
class ConexionManager extends Manager
{

    public function getMember($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, password FROM member');
        $req->execute(array());
        $member = $req->fetch();

        $req->closeCursor();

        return $member;
    }

    public function getMembers() 
    {
        $db = $this->dbConnect();
        $members = $db->prepare('SELECT pseudo, password FROM member');
        $manbers->execute(array());

        return $members;
    }
}