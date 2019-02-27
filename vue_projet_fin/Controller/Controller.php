<?php
namespace EG\Controller;

//use \EG\Model\InscriptManager;
use \EG\Model\LivreManager;

class controller
{
    private $LivreManager;

    public function __construct()
    {
        // $this->inscriptManager = new InscriptManager();
        $this->livreManager = new LivreManager();
    }

    public function inscript()
    {

        require 'view/inscriptView.php';
        //TODO appelle de model et une autre dirige ver la vue
    }

    public function addInscription($pseudo, $password, $email)
    {
        //TODO appelle manager d'inscription (creation de compte)
        $affectedLines = $this->inscriptManager->addMember($pseudo, $password, $email);

        if ($affectedLines === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Inscription impossible');
        }
        // else {
        //    header('Location: index.php?action=conexion');
        //}
    }
    public function getLivres()
    {

        $Livres = $this->LivreManager->getLivres();
        // apppelle metode du modele qui va cherche les livre dans la bdd
        if ($Livres === false) {
            // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
            throw new Exception('Inscription impossible');
        }
            require 'view/frontend/PrincipalView.php';
    }
}
