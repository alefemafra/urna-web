<?php
class adminController extends controller{

    public function index(){
        if(!isset($_SESSION['adminUsuario']) || empty($_SESSION['adminUsuario'])){
            header("location: " . BASE_URL . "admin/login");
        }
        $this->loadTemplate('adminTemplate', 'adminHome');
    }
    
    public function login(){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            $this->loadTemplate('adminTemplate','adminLogin');
        }else{
            $this->loadTemplate('adminTemplateGuest','adminLogin');
        }
    }

    public function cadastrarEdital(){
        if(!isset($_SESSION['adminUsuario']) || empty($_SESSION['adminUsuario'])){
            header("location: " . BASE_URL . "admin/login");
        }

        $this->loadTemplate('adminTemplate','adminCadastrarEdital');
    }

    public function editarEdital($tipo = NULL){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if($tipo != NULL){
                $edital = new Edital($tipo);

                if($edital->getInfos() != false){
                    $dados = [
                        'edital' => $edital->getInfos()
                    ];
    
                    $this->loadTemplate('adminTemplate','adminEditaEdital', $dados);
                }else{
                    $this->loadTemplate('adminTemplate','adminEditaEditalInexistente');
                }
                
            }else{
                $edital = new Edital();
                $dados = [
                    'editais' => $edital->listar()
                ];

                $this->loadTemplate('adminTemplate','adminListaEditais', $dados);
            }
        }else{
            header("location: " . BASE_URL . "admin/login");
        }
    }

    public function cadastrarConta($tipo = NULL){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if($tipo == "sistema"){
                $this->loadTemplate('adminTemplate','adminCriaSistema');
            }else if($tipo == "participante"){
                $cargo = new Cargo();
                $dados = [
                    'cargo' => $cargo->getCargos()
                ];
                $this->loadTemplate('adminTemplate','adminCriaParticipante', $dados);
            }else{
                echo "nenhum tipo";
            }
        }else{
            header("location: " . BASE_URL . "admin/login");
        }
        
    }

    public function cadastrarCargo(){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            $this->loadTemplate('adminTemplate','adminCadastrarCargo');
        }else{
            header("location: " . BASE_URL . "admin/login");
        }
    }

    public function cadastrarEleicao($id_edital = NULL){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if($id_edital == NULL){
                $this->loadTemplate('adminTemplate','adminCadastrarEleicaoInexistente');
            }else{

                $dados = ["edital_id" => 1];
                $this->loadTemplate('adminTemplate','adminCadastrarEleicao', $dados);
            }
        }else{
            header("location: " . BASE_URL . "admin/login");
        }
    }

    public function criarEleicao(){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            $edital = new Edital();
            $cargo = new Cargo();
            $dados = [
                "editais" => $edital->listar(),
                "cargos" =>  $cargo->getCargos()
            ];
            $this->loadTemplate('adminTemplate','adminCadastrarEleicao', $dados);
        }else{
            header("location: " . BASE_URL . "admin/login");
        }
        
    }

    public function editarEleicao($id = NULL){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if($id != NULL){
                $eleicao = new Eleicao($id);
                $dados = [
                    'eleicoes' => $eleicao->getEleicao()
                ];
                
                $this->loadTemplate('adminTemplate','adminEditaEleicao', $dados);
            }else{
                $eleicao = new Eleicao();
                $lista = $eleicao->listar();
                if($lista != false){
                    $dados = [
                        'eleicoes' => $lista
                    ];
                    $this->loadTemplate('adminTemplate','adminListaEleicoes', $dados);
                }else{
                    echo "Nenhuma eleição disponível";
                }
            }
        }else{
            header("location: " . BASE_URL . "admin/login");
        }
    }

    //Funções Lógicas
    public function _loginAdmin(){
        if(isset($_POST) && !empty($_POST)){
            $login = addslashes($_POST['login']);
            $senha = addslashes($_POST['senha']);

            $banco = new Sistema();
            $usuario = $banco->usuarioExiste($login, $senha);
            
            if($usuario){
                $_SESSION['adminUsuario'] = $usuario;
                header('location: ' . BASE_URL . "admin/");
            }else{
                header('location: ' . BASE_URL . "admin/");
            }
        }else{
            header('location: ' . BASE_URL . "admin/");
        }
    }
    public function _sairAdmin(){
        unset($_SESSION['adminUsuario']);
        header('location: ' . BASE_URL . "admin/login");
    }

    public function _cadastrarEdital(){
        if(isset($_POST) && !empty($_POST)){

            $numero = addslashes($_POST['numero']);
            $arquivo = $_FILES['arquivo'];

            if(substr($arquivo['name'], -3) == "pdf"){
                if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
                    echo "certp";
                    move_uploaded_file($arquivo['tmp_name'], "assets/editais/" . $numero . "-" . time() . "-" . $arquivo['name']);

                    $editalUrl = "assets/editais/" . $numero . "-" . time() . "-" . $arquivo['name'];

                    $edital = new Edital();

                    global $data;

                    $edital->cadastrarEdital($numero, $data, $editalUrl);

                    header('location: ' . BASE_URL . "admin/");
                }else{
                    echo "Ocorreu algum erro";
                }
            }else{
                echo "Não é pdf";
            }
        }else{
            header('location: ' . BASE_URL . "admin/");
        }
    }

    public function _cadastrarConta($tipo = NULL){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if(isset($_POST) && !empty($_POST)){
                if($tipo == "sistema"){
                    $email = addslashes($_POST['login']);
                    $senha = addslashes($_POST['senha']);

                    $sistema = new Sistema();
                    $sistema->cadastrar($email, $senha);

                    header('location: ' . BASE_URL . "admin/");
                    
                }else if($tipo == "participante"){

                    $cpf = addslashes($_POST['cpf']);
                    $nome = addslashes($_POST['nome']);
                    $email = addslashes($_POST['email']);
                    $senha = addslashes($_POST['senha']);
                    $tipo = addslashes($_POST['tipoconta']);

                    $participante = new Participante();
                    $participante->cadastrar($tipo, $cpf, $nome, $email, $senha);
                    echo "deu certo";
                }else{
                    echo "nenhum tipo";
                }
            }else{
                header('location: ' . BASE_URL . "admin/");
            }
        }else{
            header('location: ' . BASE_URL . "admin/");
        }
    }

    public function _editarEdital($id){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if(isset($_POST) && !empty($_POST)){
                $numero = addslashes($_POST['numero']);
                $status = addslashes($_POST['status']);

                $edital = new Edital($id);
                $edital->atualizaEdital($numero, $status);

                header('location: ' . BASE_URL . "admin/");

            }else{
                header('location: ' . BASE_URL . "admin/");
            }
        }else{
            header('location: ' . BASE_URL . "admin/");
        }
    }

    public function _cadastrarCargo(){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if(isset($_POST) && !empty($_POST)){
                $nome = addslashes($_POST['cargo']);
                
                $cargo = new Cargo();
                $cargo->cadastrar($nome);

                header('location: ' . BASE_URL . "admin/");
            }else{
                header('location: ' . BASE_URL . "admin/");
            }
         }
    }

    public function _criarEleicao(){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if(isset($_POST) && !empty($_POST)){
                $tipoconta = addslashes($_POST['tipoconta']);
                $titulo = addslashes($_POST['titulo']);
                $nm_participantes = 0;

                $participante = new Participante();

                foreach($_POST['cargo'] as $cargoForm){
                    $nm_participantes += $participante->getNmCargosParticipantes($cargoForm);
                }

               echo $nm_participantes;

               $eleicao = new Eleicao();
               $eleicao->cadastrar($tipoconta, $titulo, $nm_participantes);
               header('location: ' . BASE_URL . "admin/");

            }else{
                header('location: ' . BASE_URL . "admin/");
            }
        }else{
            header('location: ' . BASE_URL . "admin/");
        }
    }

    public function _editarEleicao($id){
        if(isset($_SESSION['adminUsuario']) && !empty($_SESSION['adminUsuario'])){
            if(isset($_POST) && !empty($_POST)){
                $titulo = addslashes($_POST['titulo']);
                $status = addslashes($_POST['status']);
                $eleicao = new Eleicao($id);
                
                $eleicao->update($titulo, $status);
                header('location: ' . BASE_URL . "admin/");
            }else{
                header('location: ' . BASE_URL . "admin/");
            }
        }else{
            header('location: ' . BASE_URL . "admin/");
        }
    }
}

