<?php
class notfoundController extends controller{

    public function index(){
        
        $this->loadTemplate('template', 'notfound'); 
    }
}
