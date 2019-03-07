<?php

namespace EG\model;

use EG\Model\Manager;

class  CrealivreManager extends Manager
{

    public function addlivre($titre, $resum, $image, $id_genre, $id_membre)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO livre(titre, resum, image, id_genre, id_membre) VALUES(?, ?, ?, ?, ?)');
        $req->execute(array(
            $titre,
            $resum,
            $image,
            $id_genre,
            $id_membre,
        ));

        $req->closeCursor();

        return $req;
    }

}