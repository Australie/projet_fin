<?php
//fait appelle a la basse de donner des livre donc requete sql
namespace EG\Model;

use \EG\Model\Manager;

class LivreManager extends Manager
{
    public function getLivre()
    {
        $db = $this->dbConnect();
        $Livre = $db->prepare('SELECT livre.id, titre, resum, image, id_membre, id_genre, M.pseudo, G.libel
        FROM livre
        INNER JOIN membre M ON livre.id_membre = M.id
        INNER JOIN genre G ON livre.id_genre = G.id
        WHERE M.id =?');
        $Livre->execute(array($_SESSION['member_id']));
        return $Livre;
    }

    public function findLivre($id)
    {
        $db = $this->dbConnect();
        $Livre = $db->prepare('SELECT *
        FROM livre
        WHERE id =?');
        $Livre->execute(array($id));
        return $Livre->fetch();
    }

    public function getChaps($id)
    {
        $db = $this->dbConnect();
        $Chapters = $db->prepare('SELECT content , creation_date ,chapter.id ,id_Livre, title , id_membre , number FROM livre INNER JOIN chapter on livre.id = chapter.id_Livre where id_Livre = ?');
        $Chapters->execute(array($id));
        return $Chapters;
    }


    public function postChaps($title, $content, $id_Livre)
    {
        $db = $this->dbConnect();
        $Chaps = $db->prepare('INSERT INTO chapter (title, content, creation_date,id_Livre)
        VALUES (?,?, NOW(), ?)');
        $Chaps->execute(array($title, $content, $id_Livre));
        return $Chaps;
    }



    public function addLivre($titre, $resum, $image, $id_genre, $id_membre)
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



    public function getLivres()
    {
        $db = $this->dbConnect();
        $Livres = $db->prepare('SELECT livre.id, titre, resum, image, id_membre, id_genre, M.pseudo, G.libel FROM livre
        INNER JOIN membre M ON livre.id_membre = M.id
        INNER JOIN genre G ON livre.id_genre = G.id ');
        $Livres->execute(array());
        return $Livres;
    }


    public function getGenre()
    {
        $db = $this->dbConnect();
        $Genres = $db->query('SELECT id,libel FROM genre ');

        return $Genres;
    }


    public function getText($idChap)
    {
        $db = $this->dbConnect();
        $Text = $db->prepare('SELECT content, id_livre  FROM chapter WHERE id = ? ');
        $Text->execute(array(
            $idChap

        ));
        return $Text;
    }




    public function modifLivre($titre, $resum, $image, $id_genre, $id_membre, $id)
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
    public function modifTextLivre($title, $content, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapter
        SET title = (:tile), content = (:content)
        WHERE id = (:id)');
        $req->execute(array(
            ':tile' => $title,
            ':content' => $content,
            ':id' => $id,

        ));

        return $req;
    }
    public function getLivresWithGenre($id_genre){
    $db = $this->dbConnect();
    $Livres = $db->prepare('SELECT livre.id, titre, resum, image, id_membre, id_genre, M.pseudo, G.libel FROM livre
    INNER JOIN membre M ON livre.id_membre = M.id
    INNER JOIN genre G ON livre.id_genre = G.id 
    WHERE livre.id_genre=?');
    $Livres->execute(array(
        $id_genre
    
    ));
    return $Livres;
   }
}
