<?php
class Sistema extends model{
    
    public function usuarioExiste($email, $senha){
        $sql = $this->sql("SELECT * FROM sistema WHERE login = '$email' AND senha = '$senha';");
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql[0];
        }else{
            return false;
        }
    }

    public function cadastrar($login, $senha){
        $sql = $this->sql("INSERT INTO sistema VALUES (NULL, '$login', '$senha')");
    }
}