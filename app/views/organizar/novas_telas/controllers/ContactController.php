<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repositories/ContactRepository.php";

$contatos = new ContactController();

class ContactController{

	function __construct(){
		
        if(isset($_POST["action"])){
			$action = $_POST["action"];
		}else if(isset($_GET["action"])){
			$action = $_GET["action"];
		}

		if(isset($action)){
			$this->callAction($action);
		} else {
			$msg = "Nenhuma acao a ser processada...";
            print_r($msg);
			//include_once "index.php";
		}
	}

    public function callAction(string $functionName = null){

        if (method_exists($this, $functionName)) {
            $this->$functionName();
        
        } else if(method_exists($this, "preventDefault")) {
            $met = "preventDefault";
            $this->$met();
        
        } else {
            throw new BadFunctionCallException("Usecase not exists");
        }
    }

    public function loadView(string $path, array $data = null, string $msg = null){
        $caminho = __DIR__ . "/../views/" . $path;
        // echo("msg=");
        // print_r($msg);
 
        if(file_exists($caminho)){
             require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function create(){
        
        $contato = new ContactModel();

		$contato->setNome($_POST["nome"]);
		$contato->setEmail($_POST["email"]);
        $contato->setAssunto($_POST["assunto"]);
        $contato->setMensagem($_POST["mensagem"]);
        $contactRepository = new ContactRepository();
        $idContact = $contactRepository->create($contato);

        if($idContact){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function loadFormNew(){
        $this->loadView("forms/contacts/formCadastroContact.php", null,"teste");
    }    

    private function findAll(string $msg = null){
        
        $contactRepository = new ContactRepository();

        $contato = $contactRepository->findAll();

        $data['titulo'] = "listar contatos";
        $data['contatos'] = $contato;

        $this->loadView("forms/contacts/Contactlist.php", $data, $msg);
    }

    private function findContactById(){
        $idParam = $_GET['idContact'];

        $contactRepository = new ContactRepository();
        $contato = $contactRepository->findContactById($idParam);

        print "<pre>";
        print_r($contato);
        print "</pre>";
    }

    private function deleteContactById(){
        $idParam = $_GET['idContact'];
        $contactRepository = new ContactRepository();    

        $qt = $contactRepository->deleteContactById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['idContact'];
        $contactRepository = new ContactRepository(); 
        $contato = $contactRepository->findContactById($idParam);
        $data['contatos'] = $contato;

        $this->loadView("forms/contacts/formEditaContact.php", $data);
    }

    private function update(){
        $contato = new ContactModel();

		$contato->setIdContact($_GET["idContact"]);
		$contato->setNome($_POST["nome"]);
		$contato->setEmail($_POST["email"]);
        $contato->setAssunto($_POST["assunto"]);
        $contato->setMensagem($_POST["mensagem"]);

        $contactRepository = new ContactRepository();
        //print_r($contato);
        $atualizou = $contactRepository->update($contato);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}
		// include_once "cadastrar.php";

        $this->findAll($msg);        
    }

    private function preventDefault() {
        print "Ação indefinida...";
    }
}

