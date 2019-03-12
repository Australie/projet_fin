<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use EG\Model\Manager;

class GenreManager extends Manager
{
    public function getgenre()
    {
        $db = $this->dbConnect();
        $Genres = $db->query('SELECT id,libel FROM genre ');

        return $Genres;
    }
}
