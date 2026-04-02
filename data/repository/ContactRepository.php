<?php
require_once "../data/database/connexion.php";

class ContactRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function insert(int $id_cat, int $id_cont, int $id_user):bool {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (id_cat,id_con,id_user) VALUES (:idC,:idCo,:idU)");

        try {
            return $stmt->execute([
                ":idC" => $id_cat,
                ":idCo" => $id_cont,
                ":idU" => $id_user
            ]);
        }

        catch (PDOException $ex) {
            echo $ex;
            return false;
        }
    }

    public function select($idUser) {
        $stmt = $this->pdo->prepare(
        "SELECT 
            u1.nome, 
            u1.id as idCon,     
            u.id as idDe,
            u1.descricao descContact, 
            cat.nome as categoria,
            u1.telefone as telefone
        from contacts c 
        inner join user u on u.id = c.id_user
        inner join user u1 on u1.id = c.id_con 
        inner join category cat on cat.id = c.id_cat
        where u.id = :id
        order by c.id;");

        try {
            $stmt->execute([":id" => $idUser]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id_con= :id");
        try {
            return $stmt->execute(["id" => $id]);
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    }
}