<?php
class homeController extends controller{

    public function index(){
        
        $dados = array(
            'quantidade' => 5
        );
        
        if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
            $this->loadTemplate('template', 'home', $dados);
        }else{
            $this->loadTemplate('templateGuest', 'home', $dados);
        }
        
    }
    
    public function teste(){
        
    }
}

