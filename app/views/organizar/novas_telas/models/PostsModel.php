<?php
class PostsModel {
	
	private $idPosts;
	private $autor;
	private $titulo;
	private $resumo;
	private $texto;
	private $tipoPostagem;

	
	public function getIdPosts(): int{
		return $this->idPosts;
	}
	
	public function setIdPosts(int $idPosts){
		$this->idPosts = $idPosts;
	}	
	
	public function getAutor(): string{
		return $this->autor;
	}
	
	public function setAutor(string $au){
		$this->autor = $au;
	}

	public function getTitulo(): string{
		return $this->titulo;
	}
	
	public function setTitulo(string $titulo){
		$this-> titulo = $titulo;
	}

	public function getTexto(): string{
		return $this->texto;
	}
	
	public function setTexto(string $text){
		$this-> texto = $text;
	}

	public function getTipoPostagem(): string{
		return $this->tipoPostagem;
	}
	
	public function setTipoPostagem(string $tipoPostagem){
		$this->tipoPostagem = $tipoPostagem;
	}
	
	public function getResumo(): string{
		return $this->resumo;
	}
	
	public function setResumo(string $resumo){
		$this->resumo = $resumo;
	}
}