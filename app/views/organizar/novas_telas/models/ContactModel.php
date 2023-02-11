<?php
class ContactModel {
	
	private $idContact;
	private $nome;
    private $email;
    private $assunto;
    private $mensagem;


	
	public function getidContact(): int{
		return $this->idContact;
	}
	
	public function setidContact(int $idContact){
		$this->idContact = $idContact;
	}	

	public function getNome(): string{
		return $this->nome;
	}
	
	public function setNome(string $nome){
		$this->nome = $nome;
	}

    public function getEmail(): string{
		return $this->email;
	}
	
	public function setEmail(string $email){
		$this->email = $email;
	}

    public function getAssunto(): string{
		return $this->assunto;
	}
	
	public function setAssunto(string $assunto){
		$this->assunto = $assunto;
	}

    public function getMensagem(): string{
		return $this->mensagem;
	}
	
	public function setMensagem(string $mensagem){
		$this->mensagem = $mensagem;
	}



}