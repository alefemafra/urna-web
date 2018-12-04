<?php
class Cargo extends model{
    
    public function cadastrar($nome){
        $this->sql("INSERT INTO cargo VALUES (NULL, '$nome');");
    }
    
    public function getCargos(){
        $sql = $this->sql("SELECT * FROM cargo;");
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            $retorno = [];

            foreach ($sql as $cargo){
                $retorno[] = [
                    "id" => $cargo['id_cargo'],
                    "nome" => $cargo['nome']
                ];
            
            }
            return $retorno;
        }else{
            return false;
        }
    }
}