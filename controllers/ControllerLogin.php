<?php

class ControllerLogin
{
    private $_usersManager;

    public function __construct()
    {
        $this->login();
    }

    private function login() {

        $this->_usersManager = new UsersManager;

        if (isset($_POST['login'])) {
            $user = $this->_usersManager->getUser();

            $user_connexion = $_POST['user_connexion'];
            $password_connexion = $_POST['password_connexion'];

            if ($user_connexion == $user[0]->user_name() &&
                $password_connexion == $user[0]->password()) {
                    $_SESSION['connected'] = true;
                    $_SESSION['user'] = $user_connexion;
                    header('Location: articles');
            }
            else
                $message_connexion = 'Identifiant ou mot de passe incorrect';
        }
        require_once('views/viewAdmin.php');
    }    
}
