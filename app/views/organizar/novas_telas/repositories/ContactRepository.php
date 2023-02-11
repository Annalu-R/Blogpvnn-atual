<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/ContactModel.php";

    class ContactRepository {

        public $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(ContactModel $contato) : int {
            try {
                $query = "INSERT INTO contatos (nome, email, assunto, mensagem) VALUES (:nome, :email, :assunto, :mensagem)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":nome", $contato->getNome());
                $prepare->bindValue(":email", $contato->getEmail());
                $prepare->bindValue(":assunto", $contato->getAssunto());
                $prepare->bindValue(":mensagem", $contato->getMensagem());
                $prepare->execute();
                
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                
                    print("Erro ao inserir cliente no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM contatos");
            $contatos  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $contatos;
        }

        public function findContactById(int $idContact) {
            $query = "SELECT * FROM contatos WHERE idContact = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $idContact, PDO::PARAM_INT);

            if($prepare->execute()){
                $contato = $prepare->fetchObject("ContactModel");
            } else {
                $contato = null;
            }
            return $contato;
        }

        public function update(ContactModel $contato) : bool {
            $query = "UPDATE contatos SET nome = ?, email = ?, assunto = ?, mensagem = ? WHERE idContact = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $contato->getNome());
            $prepare->bindValue(2, $contato->getEmail());
            $prepare->bindValue(3, $contato->getAssunto());
            $prepare->bindValue(4, $contato->getMensagem());
            $prepare->bindValue(5, $contato->getidContact());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteContactById( int $idContact) : int {
            $query = "DELETE FROM contatos WHERE idContact = :idContact";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":idContact", $idContact);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }
