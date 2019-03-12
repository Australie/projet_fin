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

//inscription//
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
                }
//connexion//
                elseif ($_GET['action'] == 'conexion') {
                    $this->controller->connect();

                } elseif ($_GET['action'] == 'verifconexion') {
                    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                        $this->controller->verif($_POST['pseudo'], $_POST['password']);
                    } else { // Autre exception
                        throw new Exception('tous les champs ne sont pas remplis !');
                    }
//compte//
                } elseif ($_GET['action'] == 'conexcompte') {
                    $this->controller->compte();
//deconnexion//
                } elseif ($_GET['action'] == 'decocompte') {

                    // On détruit les variables de notre session
                    session_unset();

                    // On détruit notre session
                    session_destroy();

                    $this->controller->redirect();
                }
//alert commentaire//
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
//creation livre//
                } elseif ($_GET['action'] == 'creaLivre') {

                    if (!empty($_POST['Titre']) && !empty($_POST['resume']) && !empty($_POST['image']) && !empty($_POST['genre']) && !empty($_SESSION['member_id'])) {

                        $this->controller->Postcreat($_POST['Titre'], $_POST['resume'], $_POST['image'], $_POST['genre'], $_SESSION['member_id']);
                    }

                } elseif ($_GET['action'] == 'creationLivre') {
                    $this->controller->redirectcrea();

                }
//creation chapitre//                 
                elseif ($_GET['action'] == 'ViewChaps') {
                    $this->controller->ViewText($_GET['id']);

                } elseif ($_GET['action'] == 'creaChaps') {
                    if (!empty($_POST['titre']) && !empty($_POST['content']) ) {

                        $this->controller->creaText($_POST['titre'], $_POST['content'], $_GET['id'] );
                   

                }
            }
//suprimer//
                //metre condition compte actif
                //supprimer tout le liver//
                elseif ($_GET['action'] == 'Supprimer') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->supre($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                //supprimer les commentaire//
                } elseif ($_GET['action'] == 'suprecomment') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->suprecomment($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                //supprimer un chapitre//    
                } elseif ($_GET['action'] == 'supreChapite') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->supreChapite($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                }
//modifier liver// 
                elseif ($_GET['action'] == 'redirectModifier') {
                    $this->controller->redirectmodif($_GET['id']);
                   
                } elseif ($_GET['action'] == 'Modifier') {
                    if (!empty($_SESSION['member_id'])) {
                        if (!empty($_POST['Titre']) && !empty($_POST['resume']) && !empty($_POST['image']) && !empty($_POST['genre']) && !empty($_SESSION['member_id'])) {

                            $this->controller->modif($_POST['Titre'], $_POST['resume'], $_POST['image'], $_POST['genre'], $_SESSION['member_id'], $_GET['id']);
                        }
                    } else {
                        throw new Exception('et et nop :p!');
                    }

                } 
//modifier chapitre et text//                    
                elseif ($_GET['action'] == 'redirectModifierlivre') {
                    $this->controller->redirectmodiflivre($_GET['id']);

                } elseif ($_GET['action'] == 'Modifierliver') {
                    if (!empty($_SESSION['member_id'])) {
                        if (!empty($_POST['titre']) && !empty($_POST['content'])) {
                            $this->controller->modifLivre($_POST['titre'], $_POST['content'], $_GET['id']);
                        } else {
                            throw new Exception('et et nop :p!');
                        }
                    }
                }
//sinon//              
                else {
                    $this->controller->getLivres();
                    $this->controller->getLivre();
                }
//sinon//
            }
            //sinon pas d'action dans l'url
            else {
                $this->controller->getLivres();

            }

        } catch (Exception $e) { // S'il y a eu une erreur, alors...
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
