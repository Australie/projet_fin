<?php
require_once("model/Manager.php");

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
}