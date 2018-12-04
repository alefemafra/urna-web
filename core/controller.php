<?php

//ajudador de todos os controllers
class controller{
    public function loadView($viewName, $viewDados = array()){
        extract($viewDados);
        require 'views/'.$viewName.'.php';
    }
    
    public function loadTemplate($templateName, $viewName, $viewDados = array()){
        require 'views/'.$templateName.'.php';
    }
    
    public function loadViewInTemplate($viewName, $viewDados = array()){
        extract($viewDados);
        require 'views/'.$viewName.'.php';
    }
}

