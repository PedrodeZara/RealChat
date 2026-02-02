<?php 
require_once "../data/database/connexion.php";
require_once "../data/models/message.php";

class MessageRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function insert(Message $mes):bool {
        $stmt = $this->pdo->prepare("INSERT INTO messages (descricao, id_user, id_con) VALUES (:descri,:idU,:idC)");
        
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
                m.id,
                m.descricao AS mensagem,
                u.nome AS User,
                u1.nome AS Contato,
                u1.nome AS 'Quem enviou'
            FROM messages m
            INNER JOIN user u ON u.id  = m.id_user
            INNER JOIN user u1 ON u1.id = m.id_con
            WHERE 
                (m.id_user = :idU AND m.id_con = :idC)
                OR
                (m.id_user = :idC AND m.id_con = :idU)
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
        $stmt = $this->pdo->prepare("DELETE FROM messages WHERE id = :id");
        try {
            return $stmt->execute([":id" => $id]);
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    } 

    public function findId(Message $mes): int {
        $stmt = $this->pdo->prepare("SELECT id FROM message WHERE descricao LIKE :descricao");
        
        try {
            $data = $stmt->execute([':descricao' => '%'.$mes->getDescricao().'%']);
            return $data->fetch(PDO::FETCH_ASSOC);
        }

        catch (PDOException $ex) {
            echo $ex;
        }

    }
}