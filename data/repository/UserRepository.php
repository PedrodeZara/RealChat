<?php 
require_once "../database/connexion.php";
require_once "../models/user.php";

class UserRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getByNumber(string $telefone): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE telefone = :telefone");
        $stmt->execute([":telefone" => $telefone]);
        $stmt->fetch(PDO::FETCH_ASSOC);

        try {
            return $stmt ?: null;
        }
        catch (PDOException $e) {
            echo $e
        }
    }

    public function insert(User $user): bool {
        $stmt = $this->pdo->prepare("INSERT INTO user (nome, descricao, telefone) VALUES (:nome,:descricao,:telefone)");
        
        try {            
            return $stmt->execute([
                ":nome" => $user->getNome(),
                ":descricao" => $user->getDescricao(),
                ":telefone" => $user->getTelefone()
            ]);
        }
        catch (PDOException $e) {
            echo $e
            return false;
        }
    }

    public function update(User $user, $id): bool {
        $stmt = $this->pdo->prepare("UPDATE user SET nome = :nome, descricao = :descricao WHERE id = :id");
        
        try {            
            return $stmt->execute([
                ":id" => $id,
                ":nome" => $user->getNome(),
                ":descricao" => $user->getDescricao(),
            ]);
        }
        catch (PDOException $e) {
            echo $e
            return false;
        }
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        try {
            $stmt->execute(["id" => $id]);
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    } 

}