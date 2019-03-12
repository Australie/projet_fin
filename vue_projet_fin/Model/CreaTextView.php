<?php

namespace EG\model;

use EG\Model\Manager;

class  CreaTextManager extends Manager
{

    public function addText($title,$content,$id_Livre)
    {
        $db = $this->dbConnect();
        $Text = $db->prepare('INSERT INTO chapter (title, content, id_Livre) 
        VALUES ( ?, ?, ? )');
        $Text->execute(array(
            $title,
            $content,
            $id_Livre
           
        ));

        $Text->closeCursor();

        return $Text;
    }

}