<?php
class CategoryModel {
	
	private $idCategory;
	private $tag;
	private $tipo;

	
	public function getidCategory(): int{
		return $this->idCategory;
	}
	
	public function setidCategory(int $idCategory){
		$this->idCategory = $idCategory;
	}	
	
	public function getTipo(): string{
		return $this->tipo;
	}
	
	public function setTipo(string $tipo){
		$this->tipo = $tipo;
	}

	public function getTag(): string{
		return $this->tag;
	}
	
	public function setTag(string $tag){
		$this->tag = $tag;
	}



}
