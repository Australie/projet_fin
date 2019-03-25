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
                } else {
                    $this->controller->getLivres();
                }
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
