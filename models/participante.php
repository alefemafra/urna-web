<?php
class Participante extends model{
    
    public function usuarioExiste($email, $senha){
        $sql = $this->sql("SELECT * FROM participante WHERE email = '$email' AND senha = '$senha';");
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql[0];
        }else{
            return false;
        }
    }

    public function cadastrar($tipo, $cpf, $nome, $email, $senha){
        $sql = $this->sql("INSERT INTO participante VALUES (NULL, '$tipo', '$cpf', '$nome', '$email', '$senha')");
    }

    public function getNmCargosParticipantes($id_cargo){
        $sql = $this->sql("SELECT * from participante WHERE cargo_id_cargo = $id_cargo");
        if($sql->rowCount() > 0){
            return $sql->rowCount();
        }else{
            return false;
        }
    }
}