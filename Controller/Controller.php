<?php
namespace EG\Controller;

//use \EG\Model\InscriptManager;
use \EG\Model\ChapitreViewManager;
use \EG\Model\CommentManager;
use \EG\Model\CrealivreManager;
use \EG\Model\GenreManager;
use \EG\Model\InscriptManager;
use \EG\Model\LivreManager;
use \EG\Model\MemberManager;
use \EG\model\AffichelivreManager;

class controller
{
    private $LivreManager;
    private $ChapitreViewManager;
    private $InscriptManager;
    private $MemberManager;
    private $commentManager;
    private $GenreManager;
    private $crealivreManager;
    private $affichelivreManager;

    public function __construct()
    {
        $this->LivreManager = new LivreManager();
        $this->ChapitreViewManager = new ChapitreViewManager();
        $this->InscriptManager = new InscriptManager();
        $this->MemberManager = new MemberManager();
        $this->commentManager = new CommentManager();
        $this->GenreManager = new GenreManager();
        $this->crealivreManager = new CrealivreManager();
        $this->affichelivreManager = new AffichelivreManager();
    }

    //ajoute les commentaire////
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
    ///gere l'incription/////
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
        } else {
            header('Location: index.php?action=conexion');
        }
    }
    /////gere la connection/////
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
    //////affiche livre///
    public function getLivres()
    {

        $Livres = $this->LivreManager->getLivres();
        // apppelle metode du modele qui va cherche les livre dans la bdd

        require 'view/frontend/PrincipalView.php';
        
    }
    /////affiche chapitre dans livre////
    public function getChaps($id)
    {
        $Chapters = $this->ChapitreViewManager->getChaps($id);
        $comments = $this->commentManager->getComments($id);

        require 'view/frontend/chapitreView.php';
    }
    ////affiche  compte/////
    public function compte()
    {
        $Livre = $this->affichelivreManager->getLivre();

        require 'view/frontend/compteView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }
    ////redirection////
    public function redirect()
    {
        header('Location: index.php');
    }
    public function redirectText()
    {
        require 'view/frontend/TextLivreView.php';
    }
    ///pour la creation du livre////
    public function Postcreat( $titre, $resum, $image, $id_genre,$id_membre)
    {
        $comments = $this->crealivreManager->addlivre( $titre, $resum, $image, $id_genre,$id_membre);
        if ($comments === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Impossible d\'ajouter le livre!');
        } else {
            header('Location: index.php?action=conexcompte');
        }
    }
    //////////pour la creation du chapitre//////

    //////////pour la creation du text du chapître/////
    public function redirectcrea()
    {
        $Genres = $this->GenreManager->getgenre();
        require 'view/frontend/creation_livreView.php';
    }
   
    public function creaText()
    {
        //$Text = $this->GenreManager->();
        require 'view/frontend/creation_livreView.php';
    }

    //////appelle les genres/////
    public function getgenres()
    {
        require 'view/frontend/creation_livreView.php';
    }

    public function supre(){
        $Suppre = $this->SuppreManager->SuppreLivre();
    }
}
