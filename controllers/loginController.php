<?php

class loginController extends controller{

    public function index(){

        if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
            $this->loadTemplate('template','login');
        }else{
            $this->loadTemplate('templateGuest','login');
        }
    }

    public function _logar(){
        if(isset($_POST) && !empty($_POST)){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $banco = new Participante();
            $usuario = $banco->usuarioExiste($email, $senha);
            
            if($usuario){
                $_SESSION['usuario'] = $usuario;
                header('location: ' . BASE_URL);
            }else{
                header('location: ' . BASE_URL . "login");
            }
        }else{
            header('location: ' . BASE_URL . "login");
        }
    }

    public function _sair(){
        unset($_SESSION['usuario']);
        header('location: ' . BASE_URL . "home");
    }
    
}

