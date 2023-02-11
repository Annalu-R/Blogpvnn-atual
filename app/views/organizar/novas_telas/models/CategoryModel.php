<?php
class CategoryModel {
	
	private $idCategory;
	private $tag;


	
	public function getidCategory(): int{
		return $this->idCategory;
	}
	
	public function setidCategory(int $idCategory){
		$this->idCategory = $idCategory;
	}	

	public function getTag(): string{
		return $this->tag;
	}
	
	public function setTag(string $tag){
		$this->tag = $tag;
	}



}
