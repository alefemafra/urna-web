<?php
class inscreverController extends controller{

    public function index(){
        $eleicao = new Eleicao();
        $lista = $eleicao->listar();
        if($lista != false){
            $dados = [
                'eleicoes' => $lista
            ];
            $this->loadTemplate('Template','ListaEleicao', $dados);
        }else{
            echo "Nenhuma eleição disponível";
        }
    }

    public function _inscreverEleicao($id){
        $eleicao = new Eleicao($id);
        echo $eleicao->get('status');
        if($eleicao->get('status') == 'publicado'){
            $candidato = new Candidato();
            $candidato->insert($id_edital, $id, $_SESSION['usuario']);
        }else{
            echo "Eleição já iniciada ou encerrada.";
        }
    }

}