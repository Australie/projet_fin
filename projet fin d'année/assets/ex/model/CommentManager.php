<?php
namespace EG\model;

use EG\model\Manager;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment.id, id_member, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM comment INNER JOIN member on member.id = id_member  ORDER BY creation_date ');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($Id, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(id_chapter,id_member, content, creation_date)VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($Id, $author, $comment));

        return $affectedLines;
    }

    public function incrementAlert($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comment SET alert = alert + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id,
        ));

        if ($success) {
            $count = $req->rowCount();
            if ($count === 0) {
                $success = false;
            }
        }

        return $success;
    }
}
