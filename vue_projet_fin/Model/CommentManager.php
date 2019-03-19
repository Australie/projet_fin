<?php
namespace EG\model;

use \EG\model\Manager;

class CommentManager extends Manager
{
    public function getComments($LivreId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment.id,creation_date,content,pseudo,id_Livre FROM comment
        INNER JOIN membre ON comment.id_membre = membre.id
        WHERE id_Livre = ? ');
        $comments->execute(array($LivreId));

        return $comments;
    }

    public function postComment($id_Livre,$id_membre, $content)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(id_Livre,id_membre, content, creation_date)
        VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array( $id_Livre,$id_membre, $content));

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
