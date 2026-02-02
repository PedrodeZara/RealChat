<?php
require_once "../data/database/connexion.php";
require_once "../data/models/message.php";

class CategoryRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function insert(Category $cat):bool {
        $stmt = $this->pdo->prepare("INSERT INTO category (nome) VALUES (:nome)");
        
        try {
            return $stmt->execute([
                ":nome" => $cat->getName(),
            ]);
        }
        catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function select(): array {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM category c"
        );

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM category WHERE id = :id");
        try {
            return $stmt->execute([":id" => $id]);
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    }
}