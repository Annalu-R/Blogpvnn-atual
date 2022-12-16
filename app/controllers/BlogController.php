<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/PostsRepository.php";
require_once __DIR__ . "/../repository/CatRepository.php";


$cUsuario = new BlogController();

class BlogController {


    private $base_path;

	function __construct(){

        $this->base_path = "http://localhost/Blog-PVNN-main";
		
        if(isset($_POST["action"])){
			$action = $_POST["action"];
		}else if(isset($_GET["action"])){
			$action = $_GET["action"];
		}

		if(isset($action)){
			$this->callAction($action);
		} else {
			$this->home();
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
             include $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function home(){


        $pagina = 1;
        $proximaPagina = 2;
        $paginaAnterior = 1;

        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
            $proximaPagina = $pagina;
            $proximaPagina++;

            if($pagina > 1) {
                $paginaAnterior = $pagina - 1;
            }
        }


        //carregar tudo o que é desejado que seja exibido na home

        //carregar posts
        $postsRepository = new PostsRepository();
        $posts = $postsRepository->findPaged(2, $pagina);
        $data['posts'] = $posts;


        //carregar categorias
        $categoryRepository = new CatRepository();
        $categories = $categoryRepository->findAll();
        $data['categories'] = $categories;


        $data['titulo'] = "BLOG DA ANA";
        $data['base_path'] = $this->base_path;
        $data['pagina'] = $proximaPagina;
        $data['pagina_anterior'] = $paginaAnterior;

        $this->loadView("blog/blog.php", $data, null);
    }


    private function post(){
        $idParam = $_GET['id'];

        $userRepository = new UserRepository();
        $user = $userRepository->findUserById($idParam);

        print "<pre>";
        print_r($user);
        print "</pre>";
    }

    private function deleteUserById(){
        $idParam = $_GET['id'];
        $userRepository = new UserRepository();    

        $qt = $userRepository->deleteById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['id'];
        $userRepository = new UserRepository(); 
        $user = $userRepository->findUserById($idParam);
        $data['user'] = $user;

        $this->loadView("users/formEditaUser.php", $data);
    }

    private function update(){
        $user = new UserModel();

		$user->setId($_GET["id"]);
		$user->setNome($_POST["nome"]);
		$user->setTelefone($_POST["telefone"]);
		$user->setEmail($_POST["email"]);
        $user->setSenha($_POST["senha"]);
        $user->setUsername($_POST["userame"]);
        $user->setDtNasc($_POST["dtNascimento"]);
        $user->setTipoUser($_POST["tipoUser"]);

        $userRepository = new UserRepository();
        //print_r($user);
        $atualizou = $userRepository->update($user);
        
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
