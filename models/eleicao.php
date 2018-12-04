<?php
class Eleicao extends model{

    public function getId(){
        return $this->id;
    }
    
    public function cadastrar($tipoconta, $titulo, $nm_participantes){
        $this->sql("INSERT INTO eleicao VALUES (NULL, '$tipoconta', '$titulo', '$nm_participantes', 'avaliacao', 0, 0, 0);");
    }

    public function getEdital(){
        $sql = $this->sql("SELECT * FROM edital WHERE id_edital = " . $this->getId());
        $sql = $sql->fetch();
        return $sql['numero_edital'];
    }

    public function listar(){
        $sql = $this->sql("SELECT * FROM eleicao;");
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            $retorno = [];
            foreach($sql as $eleicao){
                $retorno[] = [
                    'id' => $eleicao['id_eleicao'],
                    'titulo' => $eleicao['titulo'],
                    'participantes' => $eleicao['total_participantes'],
                    'status' => $eleicao['status']
                ];
            }
            return $retorno;
        }else{
            return false;
        }
    }

    public function getEleicao(){
        $sql = $this->sql("SELECT * FROM eleicao WHERE id_eleicao = " . $this->getId());

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $retorno = [
                'status' => $sql['status'],
                'titulo' => $sql['titulo'],
                'id' => $sql['id_eleicao']
            ];
            return $retorno;
        }else{
            return false;
        }
    }

    public function update($titulo, $status){
        $sql = $this->sql("UPDATE eleicao SET titulo = '$titulo', status = '$status' WHERE id_eleicao = " . $this->getId());
    }

    public function listarParaParticipante(){
        $sql = $this->sql("SELECT * FROM eleicao WHERE status = 'publicado';");
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            $retorno = [];
            foreach($sql as $eleicao){
                $retorno[] = [
                    'id' => $eleicao['id_eleicao'],
                    'titulo' => $eleicao['titulo'],
                    'participantes' => $eleicao['total_participantes'],
                    'status' => $eleicao['status']
                ];
            }
            return $retorno;
        }else{
            return false;
        }
    }

    public function get($coluna){
        $sql = $this->sql("SELECT $coluna FROM eleicao WHERE id_eleicao = " . $this->getId());
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $retorno = $sql[$coluna];
            return $retorno;
        }else{
            return false;
        }
    }
}