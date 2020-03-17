<?php

class ControllerAdmin
{
    private $_usersManager;

    public function __construct()
    {
        $this->login();
    }

    private function login() {

        $this->_usersManager = new UsersManager;

        if (isset($_GET['login']) == 'login') {
            $user = $this->_usersManager->getUser();

            $user_connexion =  nl2br(htmlentities($_POST['user_connexion']));
            $password_connexion =  nl2br(htmlentities($_POST['password_connexion']));
            echo $user_connexion;
            echo $password_connexion;

            if ($user_connexion == $user[0]->user_name() &&
                password_verify($password_connexion, $user[0]->password())) {
                    $_SESSION['connected'] = true;
                    $_SESSION['user'] = $user_connexion;
                    $this->typeAlert = "success";
                    $this->message_comment = "Vous êtes maintenant connecté.";    
            }
            else {
                $this->typeAlert = "danger";
                $this->message_comment = 'Identifiant ou mot de passe incorrect';
            }
        }

        if (isset($_GET['logout'])) {
            session_destroy();
            header('Location: admin&logoutconfirmed');
        }

        if (isset($_GET['logoutconfirmed'])) {
            $this->typeAlert = "success";
            $this->message_comment = "Vous êtes maintenant deconnecté.";    
        }

        require_once('views/viewAdmin.php');
    }    
}
