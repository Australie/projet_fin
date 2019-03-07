<?php

namespace EG\model;

use EG\Model\Manager;

class  CreaTextManager extends Manager
{

    public function addText()
    {
        $db = $this->dbConnect();
        $Text = $db->prepare('');
        $Text->execute(array(
           
        ));

        $Text->closeCursor();

        return $Text;
    }

}