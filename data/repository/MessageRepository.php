<?php 
require_once "../database/connexion.php";
require_once "../models/message.php";

class MessageRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function insert(Message $mes):bool {
        $stmt = $this->pdo->prepare("INSERT INTO messages (descricao, id_user_FK, id_contact_FK) VALUES (:descri,:idU,:idC)");
        
        try {
            return $stmt->execute([
                ":descri" => $mes->getDescricao(),
                ":idU" => $mes->getIdUserMandante(),
                ":idC" => $mes->getIdUserReceptor()
            ]);
        }
        catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function select(Message $mes): array {
        $stmt = $this->pdo->prepare(
            "SELECT 
                m.descricao AS mensagem
            FROM messages m
            INNER JOIN users u ON u.id  = m.id_user_FK
            INNER JOIN users u1 ON u1.id = m.id_contact_FK
            WHERE u.id = :idU 
                AND u1.id = :idC
            ORDER BY m.id"
        );

        try {
            $stmt->execute([
                ":idU" => $mes->getIdUserMandante(),
                ":idC" => $mes->getIdUserReceptor()
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM message WHERE id = :id");
        try {
            $stmt->execute(["id" => $id]);
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    } 
}