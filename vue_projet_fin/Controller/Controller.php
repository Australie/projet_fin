<?php
namespace EG\Controller;

//use \EG\Model\InscriptManager;
use \EG\Model\ChapitreViewManager;
use \EG\Model\InscriptManager;
use \EG\Model\LivreManager;
use \EG\Model\MemberManager;
use \EG\Model\CommentManager;


class controller
{
    private $LivreManager;
    private $ChapitreViewManager;
    private $InscriptManager;
    private $MemberManager;
    private $commentManager;

    public function __construct()
    {
        $this->LivreManager = new LivreManager();
        $this->ChapitreViewManager = new ChapitreViewManager();
        $this->InscriptManager = new InscriptManager();
        $this->MemberManager = new MemberManager();
        $this->commentManager = new CommentManager();
    }
    
    public function addComment($id_Livre, $pseudo, $content)
    {
        $affectedLines = $this->commentManager->postComment($id_Livre, $pseudo, $content);

        if ($affectedLines === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=getChaps&id=' . $id_Livre);
        }
    }
    public function inscript()
    {
        require 'view/frontend/inscriptView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
    public function addInscription($pseudo, $password, $email)
    {
        //TODO appelle manager d'inscription (creation de compte)
        $affectedLines = $this->InscriptManager->addMember($pseudo, $password, $email);

        if ($affectedLines === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Inscription impossible');
        }
        else {
            header('Location: index.php?action=conexion');
        }
    }
    public function connect()
    {
        require 'view/frontend/connexionView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
    public function verif($pseudo, $password)
    {
        $req = $this->MemberManager->getMember($pseudo);

        if ((password_verify($password, $req['password'])) && ($pseudo == $req['pseudo'])) {

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['member_id'] = $req['id'];
            

            header('Location: index.php');
        } else {
            throw new Exception('authentification impossible');
        }

    }
    public function getLivres()
    {

        $Livres = $this->LivreManager->getLivres();
        // apppelle metode du modele qui va cherche les livre dans la bdd

        require 'view/frontend/PrincipalView.php';
    }
    public function getChaps($id)
    {
        $Chapters = $this->ChapitreViewManager->getChaps($id);
        $comments = $this->commentManager-> getComments($id);
        
        require 'view/frontend/chapitreView.php';
    }
    public function compte()
    {
        require 'view/frontend/compteView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
    public function redirect()
    {
        header('Location: index.php');
    }

}