<?php

namespace EG\model;

use EG\Model\Manager;

class ModiflivreManager extends Manager
{

    public function ModifLivre($titre, $resum, $image, $id_genre, $id_membre,$id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE livre 
        SET titre = (:titre), resum = (:resum), image = (:image), id_membre =(:id_membre), id_genre = (:id_genre) 
        WHERE id = (:id)');
        $req->execute(array(
            ':titre' => $titre,
            ':resum' => $resum,
            ':image' => $image,
            ':id_membre' => $id_membre,
            ':id_genre' => $id_genre,
            ':id' => $id,
           
        ));
 
        return $req;
    }
    public function ModifTextLivre($titre,$content,$id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE livre 
        SET titre = (:titre), content = (:content) 
        WHERE id = (:id)');
        $req->execute(array(
            ':titre' => $titre,
            ':content' => $content,
            ':id' => $id,
           
        ));

        return $req;
    }

}

//UPDATE `livre` SET `titre`='test12',`resum`='lorem2',`image`='3.jpg',`id_genre`='2' WHERE 23//