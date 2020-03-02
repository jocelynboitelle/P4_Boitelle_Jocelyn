<?php

class ControllerLogout
{
    public function __construct()
    {
        $this->logout();
    }

    private function logout() {

        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: login');
        }
    }    
}
