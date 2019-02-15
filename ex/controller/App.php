<?php
//appelle le controller
require('controller/Controller.php');

class App
{
    private $controller;

    public function run()
    {
        $this->controller = new Controller;
        
        try {// Lien
            if (isset($_GET['action']))
             {
                if ($_GET['action'] == 'Chapters')
                {
                    $this->controller->getChapters();
                }
                 elseif ($_GET['action'] == 'chapter')
                 {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->controller->getChapter();
                    } 
                    else
                    {// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('aucun identifiant de billet envoyé');
                    }
                } 
                elseif ($_GET['action'] == 'addComment') 
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['content']))
                        {
                            $this->controller->addComment($_GET['id'], $_POST['author'], $_POST['content']);
                        }
                         else 
                         {   // Autre exception
                            throw new Exception('tous les champs ne sont pas remplis !');
                        }
                    }
                     else 
                     { // Autre exception
                        throw new Exception(' aucun identifiant de chapitre envoyé');
                    }
                } 
              
                 elseif ($_GET['action'] == 'inscription')
                     {
                      $this->controller->inscript();
                   //declarée inscipt qui appelle une methode du modelle qui fait un insrt intoo dans le tableau member
                     //qui en redirigée ver la vue
                  
                  }
                  elseif ($_GET['action'] == 'addInscription')
                  {
                    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) 
                    {
                      $this->controller->addInscription($_POST['pseudo'], $_POST['password']);
                    }
                    else
                    {   // Autre exception
                    throw new Exception('tous les champs ne sont pas remplis !');
                   }
                      
                  

                  }
                  elseif ($_GET['action'] == 'conection')
                  {
                      $this->controller->connect();
                  } else 
                  {
                      $this->controller->connect();
                  }
                } else {
                    $this->controller->inscript();
                }
            }

      
      catch(Exception $e)// S'il y a eu une erreur, alors...
             {
                echo 'Erreur : ' . $e->getMessage();
             }
    }
}