<?php
class Edital extends model{
    
    public function getId(){
        return $this->id;
    }
    
    public function cadastrarEdital($numero, $dataPublicado, $editalUrl){
        $this->sql("INSERT INTO edital VALUES (NULL, '$numero', '$dataPublicado', '$editalUrl', 'espera')");
    }

    public function listar(){
        $sql = $this->sql("SELECT * FROM edital");
        if($sql->rowCount() > 0){
            $retorno = [];
            $sql = $sql->fetchAll();
            foreach($sql as $edital){
                $retorno[] = [
                    'numero' => $edital['numero_edital'],
                    'data' => $edital['data_publicado'],
                    'id' => $edital['id_edital'],
                    'status' => $edital['status']
                ];
            }
            return $retorno;
        }else{
            return false;
        }
    }

    public function getInfos(){
        $sql = $this->sql("SELECT * FROM edital WHERE id_edital = '" . $this->getId() . "'");
        if($sql->rowCount() > 0){
            $retorno = [];
            $sql = $sql->fetch();
                $retorno = [
                    'id' => $sql['id_edital'],
                    'numero' => $sql['numero_edital'],
                    'data' => $sql['data_publicado'],
                    'url' => $sql['url_pdf'],
                    'status' => $sql['status']
                ];
            return $retorno;
        }else{
            return false;
        }
    }

    public function atualizaEdital($numero, $status){
        $this->sql("UPDATE edital SET numero_edital = '$numero', status = '$status' WHERE id_edital = '" . $this->getId() . "'");
    }
}