<?php 
require_once "../data/database/connexion.php";
require_once "../data/models/message.php";

class MessageRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function insert(Message $mes):bool {
        $stmt = $this->pdo->prepare("INSERT INTO messages (descricao, id_user, id_con) VALUES (:descri,:telefone_user,:telefone_con)");
        
        try {
            return $stmt->execute([
                ":descri" => $mes->getDescricao(),
                ":telefone_user" => $mes->getTelefoneUserMandante(),
                ":telefone_con" => $mes->getTelefoneUserReceptor()
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
                u1.id as idContato,
                u.id as idUser
            FROM messages m
            INNER JOIN user u ON u.telefone  = m.telefone_user
            INNER JOIN user u1 ON u1.telefone = m.telefone_con
            WHERE 
                (m.telefone_user = :telefoneUser AND m.telefone_con = :telefoneContato)
                OR
                (m.telefone_user = :telefoneContato AND m.telefone_con = :telefoneUser)
            ORDER BY m.id"
        );

        try {
            $stmt->execute([
                ":telefoneUser" => $mes->getTelefoneUserMandante(),
                ":telefoneContato" => $mes->getTelefoneUserReceptor()
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