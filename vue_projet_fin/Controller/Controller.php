<?php
namespace EG\Controller;
use \EG\Model\LivreManager;
use \EG\Model\CommentManager;
use \EG\Model\MemberManager;
use \EG\Model\SuppreManager;
use \Exception;

class Controller
{
    private $livreManager;
    private $commentManager;
    private $memberManager;
    private $suppreManager;


    public function __construct()
    {
        $this->livreManager = new LivreManager();
        $this->commentManager = new CommentManager();
        $this->memberManager = new MemberManager();
        $this->suppreManager = new SuppreManager();

    }
  
//ajoute les commentaire//
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
//gere l'incription//
    public function inscript()
    {
        require 'view/frontend/inscriptView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
    public function addInscription($pseudo, $password, $email)
    {
        //TODO appelle manager d'inscription (creation de compte)
        $affectedLines = $this->memberManager->addMember($pseudo, $password, $email);

        if ($affectedLines === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Inscription impossible');
        } else {
            header('Location: index.php?action=conexion');
        }
    }
//gere la connection//
    public function connect()
    {
        require 'view/frontend/connexionView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
    public function verif($pseudo, $password)
    {
        $req = $this->memberManager->getMember($pseudo);
        

        if ((password_verify($password, $req['password'])) && ($pseudo == $req['pseudo'])){

            $_SESSION['role'] = $req['role'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['member_id'] = $req['id'];

            header('Location: index.php');
        } else {
            throw new Exception('authentification impossible');
        }

    }
    public static function isAdmin(){
    
        if(!empty($_SESSION['role']) && $_SESSION['role'] == 1){
            return true ;

        } else{
            return false;
        }

    }
//affiche livre//
    public function getLivres()
    {
        $Genres = $this->livreManager->getGenre();

        if (isset($_GET['genre'])) {
            $Livres = $this->livreManager->getLivresWithGenre($_GET['genre']);
        } else {
            $Livres = $this->livreManager->getLivres();
        }

        // apppelle metode du modele qui va cherche les livre dans la bdd

        require 'view/frontend/PrincipalView.php';

    }
//affiche chapitre dans livre//
    public function getChaps($id)
    {
        $Livre = $this->livreManager->findLivre($id);
        $Chapters = $this->livreManager->getChaps($id);
        $comments = $this->commentManager->getComments($id);

        require 'view/frontend/chapitreView.php';
    }
//affiche  compte//
    public function compte()
    {
        $Livre = $this->livreManager->getLivre();

        require 'view/frontend/compteView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
//redirection//
    public function redirect()
    {
        header('Location: index.php');
    }
   
    public function redirectCrea()
    {
        $Genres = $this->livreManager->getGenre();
        require 'view/frontend/creation_livreView.php';
    }
    public function redirectText($idChap){
        $Text = $this->livreManager->gettext($idChap);
        require 'view/frontend/TextView.php';
    }
//pour la creation du livre//
    public function postCreat($titre, $resum, $image, $id_genre, $id_membre)
    {
        $comments = $this->livreManager->addLivre($titre, $resum, $image, $id_genre, $id_membre);
        if ($comments === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le livre!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }
//pour la creation du chapitre//
    
    public function viewText($id)
    {
        $idlivre = $id;
        require 'view/frontend/creationChapitreView.php';
    }
    public function creaText($title,$content,$id_Livre)
    {
        $chaps =  $this->livreManager->postChaps($title,$content,$id_Livre);
        if ($chaps === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le livre!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }

//appelle les genres//
    public function getGenres()
    {
        require 'view/frontend/ModiflivreManager.php';
        require 'view/frontend/creation_livreView.php';
    }
//supprimer//
    public function supre($id)
    {
        //todo// apprelle supprimer commentaire
        //todo//appelle suprimer chapitre
        $Suppre = $this->suppreManager->suppreLivre($id);
        if ($Suppre === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible de supprimer le livre!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }
    public function supreComment($id)
    {
        $Supprec = $this->suppreManager->suppreComment($id);
        if ($Supprec === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible de supprimer le commentaire!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }
    public function supreChapite($id)
    {
        $SuppreC = $this->suppreManager->supreChapite($id);
        if ($SuppreC === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible de supprimer le commentaire!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }

//modifie//
    //modifier livre//
    public function redirectModif($id)
    {
        $Genres = $this->livreManager->getGenre();
        require 'view/frontend/modifLivreView.php';
    }
    public function modif($titre, $resum, $image, $id_genre, $id_membre, $id)
    {
        $modif = $this->livreManager->ModifLivre($titre, $resum, $image, $id_genre, $id_membre, $id);
        if ($modif === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le livre!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }

    //modifie chapiter//
    public function redirectModifLivre($id)
    {
        require 'view/frontend/modifChapitreView.php';
    }
    public function modifLivre($title, $content, $id)
    {
        $modif = $this->livreManager->ModifTextLivre($title, $content, $id);
        if ($modif === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le livre!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }
}