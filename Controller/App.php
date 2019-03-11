<?php
namespace EG\Controller;

use \EG\Controller\Controller;

class App
{
    private $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function run()
    {
        try { // Lien
            //todo si les action son des l'url alors

            if (isset($_GET['action'])) {

                if ($_GET['action'] == 'getChaps') {
                    $this->controller->getChaps($_GET['id']);

                }
//compte//
                 elseif ($_GET['action'] == 'inscription') {
                    $this->controller->inscript();
                    //declarée inscipt qui appelle une methode du modelle qui fait un insrt intoo dans le tableau member
                    //qui en redirigée ver la vue
                } elseif ($_GET['action'] == 'addInscription') {
                    if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                        $this->controller->addInscription($_POST['pseudo'], $_POST['password'], $_POST['email']);
                    } else { // Autre exception
                        throw new Exception('tous les champs ne sont pas remplis !');
                    }
                } elseif ($_GET['action'] == 'conexion') {
                    $this->controller->connect();

                } elseif ($_GET['action'] == 'verifconexion') {
                    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                        $this->controller->verif($_POST['pseudo'], $_POST['password']);
                    } else { // Autre exception
                        throw new Exception('tous les champs ne sont pas remplis !');
                    }
                } elseif ($_GET['action'] == 'conexcompte') {
                    $this->controller->compte();

                } elseif ($_GET['action'] == 'decocompte') {

                    // On détruit les variables de notre session
                    session_unset();

                    // On détruit notre session
                    session_destroy();

                    $this->controller->redirect();
                }
//
                elseif ($_GET['action'] == 'alert') {
                    // Incrément du nb d'alert sur un commentaire
                    $this->controller->incrementAlert($_GET);
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id'])) {
                        if (!empty($_POST['content'])) {
                            $this->controller->addComment($_GET['id'], $_GET['id_membre'], $_POST['content']);
                        } else { // Autre exception
                            throw new Exception('tous les champs ne sont pas remplis !');
                        }
                    }
                } elseif ($_GET['action'] == 'creaLivre') {

                    if (!empty($_POST['Titre']) && !empty($_POST['resume']) && !empty($_POST['image']) && !empty($_POST['genre']) && !empty($_SESSION['member_id'])) {

                        $this->controller->Postcreat($_POST['Titre'], $_POST['resume'], $_POST['image'], $_POST['genre'], $_SESSION['member_id']);
                    }
                } elseif ($_GET['action'] == 'creationLivre') {
                    $this->controller->redirectcrea();

                } elseif ($_GET['action'] == 'Text') {
                    $this->controller->redirectText();
                }
//suprimer//                
                ///metre condition compte actif
                elseif ($_GET['action'] == 'Supprimer') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->supre($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                } elseif ($_GET['action'] == 'suprecomment') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->suprecomment($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                } 
                elseif ($_GET['action'] == 'supreChapite') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->supreChapite($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                } 
//modifier
                elseif ($_GET['action'] == 'Modifier') {
                    $this->controller->modif();
                } else {
                    $this->controller->getLivres();
                    $this->controller->getLivre();
                }
//                
            }
            ///sinon pas d'action dans l'url
            else {
                $this->controller->getLivres();

            }

        } catch (Exception $e) { // S'il y a eu une erreur, alors...
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
