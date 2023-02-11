<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repositories/PostsRepository.php";
require_once __DIR__ . "/../repositories/CategoryRepository.php";


$post = new BlogController();

class BlogController {

    private $postController;
    private $base_path;

	function __construct(){

        // ALTERAR PARA O CAMINHO DO SEU COMPUTADOR
        $this->base_path = "http://localhost:8080/dw";
        //$this->base_path = "http://localhost/pvnn-orientacao-main/pvnn";
		
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
 
        if(file_exists($caminho)){
             include $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function home(){

        $paginaAtual    = 1;
        $proximaPagina  = 2;
        $paginaAnterior = 1;

        if (isset($_GET['pagina'])) {
            $paginaAtual = $_GET['pagina'];
            $proximaPagina = $paginaAtual + 1;

            if($paginaAtual > 1) {
                $paginaAnterior = $paginaAtual - 1;
            }
        }

        //carregar tudo o que é desejado que seja exibido na home

        //informações gerais
        $data['titulo'] = "BLOG DA ANNA";
        $data['base_path'] = $this->base_path;
        $data['pagina'] = $proximaPagina;
        $data['pagina_anterior'] = $paginaAnterior;

        //carregar posts
        $postsRepository = new PostsRepository();
        //$posts = $postsRepository->findPaged(2, $paginaAtual);
        $posts = $postsRepository->findAll();
        $data['posts'] = $posts;

        
        //carregar categorias
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->findAll();
        $data['categories'] = $categories;

        // *** IMPORTANTE ***
        //1 - Qual tela será carregada? 
        //REPOSTA: blog/home.php
        
        //2 - Com quais dados? 
        //RESPOSTA: $data é uma lista, um array, ou seja, todos os dados inseridos 
        //em $data estarão disponíveis para serem usadas por essa tela.

        $this->loadView("blog/index.php", $data, null);
    }

    public function pagePost(){

        $id = $_GET['id_param'];

        $postsRepository = new PostsRepository();
        $post = 


        //informações gerais
        $data['titulo'] = "BLOG PVNN";
        $data['base_path'] = $this->base_path;
        $data['post'] = $postsRepository->findPostById($id);

        $this->loadView("blog/post.php", $data, null);
    }

    private function preventDefault() {
        print "Ação indefinida...";
    }
}
