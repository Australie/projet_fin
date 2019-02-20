<?php
namespace EG\controller;

use EG\model\ChapterManager;
use EG\model\CommentManager;
use EG\model\InscriptManager;
use EG\model\MemberManager;

class controller
{
    private $commentManager;
    private $chapterManager;
    private $inscriptManager;
    private $MemberManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->chapterManager = new ChapterManager();
        $this->inscriptManager = new InscriptManager();
        $this->MemberManager = new MemberManager();
    }
    public function getChapters()
    {
        $chapters = $this->chapterManager->getChapters();

        require 'view/indexView.php';
    }

    public function getChapter()
    {
        $chapter = $this->chapterManager->getChapter($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);

        require 'view/postView.php';
    }
    public function addComment($Id, $author, $content)
    {
        $affectedLines = $this->commentManager->postComment($Id, $author, $content);

        if ($affectedLines === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=chapter&id=' . $Id);
        }
    }
    public function inscript()
    {

        require 'view/inscriptView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }

    public function addInscription($pseudo, $password)
    {
        //TODO appelle manager d'inscription (creation de compte)
        $affectedLines = $this->inscriptManager->addMember($pseudo, $password);

        if ($affectedLines === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Inscription impossible');
        } else {
            header('Location: index.php?action=conexion');
        }
    }

    public function connect()
    {
        require 'view/conexionView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }

    public function verif($pseudo, $password)
    {
        $req = $this->MemberManager->getMember($pseudo);

        if ((password_verify($password, $req['password'])) && ($pseudo == $req['pseudo'])) {

            $_SESSION['pseudo'] = $pseudo;

            header('Location: index.php');
        } else {
            throw new Exception('authentification impossible');
        }

    }
}
