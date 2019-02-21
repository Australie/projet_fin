<?php
namespace EG\model;

use EG\model\Manager;

class ChapterManager extends Manager
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $chapters = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM chapter ORDER BY creation_date DESC');

        return $chapters;
    }
    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM chapter WHERE id = ? ');
        $req->execute(array($id));
        $chapter = $req->fetch();

        $req->closeCursor();

        return $chapter;
    }

    public function postChapters($id, $author, $comment)
    {
        $db = $this->dbConnect();
        $chapters = $db->prepare('INSERT INTO comment(id_post, author, content, creation_date)VALUES(?, ?, ?, NOW())');
        $affectedLines = $chapters->execute(array($id, $author, $comment));

        return $affectedLines;

    }
}
