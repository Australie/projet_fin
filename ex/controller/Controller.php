<?php
//appelle PostManager et CommentManager
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/InscriptManager.php');

class controller
{
    private $commentManager;
    private $chapterManager;
    private $inscriptManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->chapterManager = new ChapterManager();
        $this->inscriptManager = new InscriptManager();

    }
    public function getChapters()
    {
      $chapters = $this->chapterManager->getChapters();

      require('view/indexView.php');
    }

    public function getChapter()
    {    
      $chapter = $this->chapterManager->getChapter($_GET['id']);
      $comments = $this->commentManager->getComments($_GET['id']);

        require('view/postView.php');
    }
    public function addComment($Id, $author, $content)
    {
        $affectedLines = $this->commentManager->postComment($Id, $author, $content);

        if ($affectedLines === false) 
        {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=chapter&id=' . $Id);
        }
    }
    public function inscript(){
        
        require('view/inscriptView.php');
        //TODO appelle de model et une autre dirige ver la vue 
    }
    public function addInscription($pseudo,$password){
        //TODO appelle manager d'inscription (creation de compte)  
        $affectedLines = $this->inscriptManager->addMember($pseudo,$password);

        if ($affectedLines === false) 
        {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Inscription impossible');
        } else {
            header('Location: index.php?action=conection');
        }
        //TODO appelle de model et une autre dirige ver la vue 
    }
    public function connect(){
        
        require('view/conexionView.php');
        //TODO appelle de model et une autre dirige ver la vue 
    }
}