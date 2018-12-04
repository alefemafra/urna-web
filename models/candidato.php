<?php
class Candidato extends model{
    
    public function insert($id_edital, $id_eleicao, $id_participante){
        $this->sql("INSERT INTO candidato VALUES (NULL, $id_edital, $id_eleicao, $id_participante, 'espera', 0)");
    }
    
}