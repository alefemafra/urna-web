<?php
//o core inicia a estrutura mvc.
class Core{
    
    //verifica qual o controller e qual a action a ser executada
    public function run(){
        
        $url = '/';
        if (isset($_GET['url'])){
            $url .= $_GET['url'];
        }
        
        //se a url receber parametros ve oque chamar, caso não, deixa como padrão o controller home e a action index
       $params = array();
        if(!empty($url) && $url != '/'){
            
            //divide a url em controller action e parametros
            $url = explode('/',$url);
            array_shift($url);
            
            //depois de dividir, diz qual foi o controller, action e parametros escolhidos.
            $currentController = $url[0]."Controller";
            array_shift($url);
            
            //ve se existe uma action na url, se existir executará aquela action, se não, executará a action index
            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }
            
            //se tiver algum parametro na url ainda, todos os valores serão parâmetros
            if(count($url) > 0){
                $params = $url;
            }
            
        }else{
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        
        if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)){
            $currentController = 'notfoundController';
            $currentAction = 'index';
        }
        
        //instancia a classe do controller definido
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }
    
}

