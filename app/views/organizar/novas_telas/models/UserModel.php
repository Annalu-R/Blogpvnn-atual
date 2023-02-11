<?php
class UserModel {
	
	private $id;
	private $username;
	private $telefone;
	private $email;
	private $senha;
	private $nome;
	private $dataNascimento;
	private $tipoUser;
	
	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	
	
	public function getUsername(): string{
		return $this->username;
	}
	
	public function setUsername(string $un){
		$this->username = $un;
	}

	public function getTelefone(): string{
		return $this->telefone;
	}
	
	public function setTelefone(string $tel){
		$this->telefone = $tel;
	}

	public function getEmail(): string{
		return $this->email;
	}
	
	public function setEmail(string $e){
		$this->email = $e;
	}
	public function getSenha(): string{
		return $this->senha;
	}
	
	public function setSenha(string $s){
		$this->senha = $s;
	}
	public function getNome(): string{
		return $this->nome;
	}
	
	public function setNome(string $n){
		$this->nome = $n;
	}
	public function getDataNascimento(): string{
		return $this->dataNascimento;
	}
	
	public function setDataNascimento(string $dt){
		$this->dataNascimento = $dt;
	}
	public function getTipoUser(): string{
		return $this->tipoUser;
	}
	
	public function setTipoUser(string $tp){
		$this->tipoUser = $tp;
	}
}
