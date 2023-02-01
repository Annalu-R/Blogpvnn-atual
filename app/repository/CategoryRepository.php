<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/CategoryModel.php";

    class CategoryRepository {

        public $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(CategoryModel $category) : int {
            try {
                $query = "INSERT INTO categorias (tipo, tag) VALUES (:tipo, :tag)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":tipo", $category->getTipo());
                $prepare->bindValue(":tag", $category->getTag());
                $prepare->execute();
                
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                
                    print("Erro ao inserir cliente no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM categorias");
            $categorias  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $categorias;
        }

        public function findCategoryByIdCategory(int $idCategory) {
            $query = "SELECT * FROM categorias WHERE idCategory = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $idCategory, PDO::PARAM_INT);

            if($prepare->execute()){
                $category = $prepare->fetchObject("CategoryModel");
            } else {
                $category = null;
            }
            return $category;
        }

        public function update(CategoryModel $category) : bool {
            $query = "UPDATE categorias SET tipo = ?, tag = ? WHERE idCategory = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $category->getTipo());
            $prepare->bindValue(2, $category->getTag());
            $prepare->bindValue(3, $category->getidCategory());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteCategoryById( int $idCategory) : int {
            $query = "DELETE FROM categorias WHERE idCategory = :idCategory";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":idCategory", $idCategory);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }
