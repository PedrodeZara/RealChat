<?php
require_once "../database/connexion.php";
require_once "../models/message.php";

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

    public function select($id): array {
        $stmt = $this->pdo->prepare(
            "SELECT c.nome FROM category c
            INNER JOIN user u ON u.id = c.id_userCat
            WHERE u.id = :id"
        );

        try {
            $stmt->execute([
                ":id" => $id
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) {
            echo $e;
        }
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM category WHERE id = :id");
        try {
            $stmt->execute(["id" => $id]);
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    }
}