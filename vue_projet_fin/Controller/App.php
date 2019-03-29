<?php
namespace EG\Controller;

use \EG\Controller\Controller;
use \Exception;

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

                        $pseudo= htmlspecialchars($_POST['pseudo']);
                        $password= htmlspecialchars($_POST['password']);
                        $email= htmlspecialchars($_POST['email']);

                        $this->controller->addInscription($pseudo, $password, $email);
                    } else { // Autre exception
                        throw new Exception('tous les champs ne sont pas remplis !');
                    }
                }
//connexion//
                elseif ($_GET['action'] == 'conexion') {
                    $this->controller->connect();
                } elseif ($_GET['action'] == 'verifconexion') {
                    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

                        $pseudo= htmlspecialchars($_POST['pseudo']);
                        $password= htmlspecialchars($_POST['password']);

                        $this->controller->verif($pseudo, $password);
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
                            
                            $content= htmlspecialchars($_POST['content']);

                            $this->controller->addComment($_GET['id'], $_GET['id_membre'], $content);
                        } else { // Autre exception
                            throw new Exception('tous les champs ne sont pas remplis !');
                        }
                    }
//creation livre//
                } elseif ($_GET['action'] == 'creaLivre') {
                    if (!empty($_POST['Titre']) && !empty($_POST['resume']) && !empty($_POST['image']) && !empty($_POST['genre']) && !empty($_SESSION['member_id'])) {

                        $Titre= htmlspecialchars($_POST['Titre']);
                        $resume= htmlspecialchars($_POST['resume']);
                        $image= htmlspecialchars($_POST['image']);
                        $genre= htmlspecialchars($_POST['genre']);
                        $member_id= htmlspecialchars($_POST['member_id']);
                        
                        $this->controller->postCreat( $Titre, $resume, $image, $genre, $member_id);
                    }
                } elseif ($_GET['action'] == 'creationLivre') {
                    $this->controller->redirectcrea();
                }
//creation chapitre//
                elseif ($_GET['action'] == 'ViewChaps') {
                    $this->controller->ViewText($_GET['id']);
                } elseif ($_GET['action'] == 'creaChaps') {
                    if (!empty($_POST['titre']) && !empty($_POST['content'])) {

                        $titre= htmlspecialchars($_POST['titre']);
                        $contant= htmlspecialchars($_POST['content']);

                        $this->controller->creaText($titre, $contant, $_GET['id']);
                    }
                }
//supprimer tout le livre//
                elseif ($_GET['action'] == 'Supprimer') {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->supre($_GET['id']);
                    } else {
                        throw new Exception('et et nop :p!');
                    }
//supprimer les commentaire//
                } elseif ($_GET['action'] == 'suprecomment' && Controller::isAdmin()) {
                    if (!empty($_SESSION['member_id'])) {
                        $this->controller->supreComment($_GET['id']);
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
                    $this->controller->redirectModif($_GET['id']);
                } elseif ($_GET['action'] == 'Modifier') {
                    if (!empty($_SESSION['member_id'])) {
                        if (!empty($_POST['Titre']) && !empty($_POST['resume']) && !empty($_POST['image']) && !empty($_POST['genre']) && !empty($_SESSION['member_id'])) {

                            $Titr= htmlspecialchars($_POST['Titre']);
                            $resum= htmlspecialchars($_POST['resume']);
                            $imag= htmlspecialchars($_POST['image']);
                            $genr= htmlspecialchars($_POST['genre']);
                            $member= htmlspecialchars($_POST['member_id']);

                            $this->controller->modif($Titr,  $resum,  $imag, $genr, $member, $_GET['id']);
                        }
                    } else {
                        throw new Exception('et et nop :p!');
                    }
                }
//modifier chapitre et text//
                elseif ($_GET['action'] == 'redirectModifierlivre') {
                    $this->controller->redirectModiflivre($_GET['id']);
                } elseif ($_GET['action'] == 'Modifierliver') {
                    if (!empty($_SESSION['member_id'])) {
                        if (!empty($_POST['title']) && !empty($_POST['content'])) {

                            $title= htmlspecialchars($_POST['title']);
                            $contente= htmlspecialchars($_POST['content']);

                            $this->controller->modifLivre($title, $contente, $_GET['id']);
                        } else {
                            throw new Exception('et et nop :p!');
                        }
                    }
                } 
//voir text//               
elseif ($_GET['action'] == 'textView') {
    $this->controller->redirectText($_GET['id']);
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
