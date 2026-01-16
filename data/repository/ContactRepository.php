<?php

class ContactRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function insert(int $id_cat, int $id_cont, int $id_user):bool {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (id_cat,id_cont,id_user) VALUES (:idC,:idCo,:idU)");

        try {
            $stmt->execute([
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

    public function select($idUser): array {
        $stmt = $this->pdo->prepare(
        "SELECT 
            c.nome, 
            u1.id as idCon,     
            u.id as idDe,
            u1.descricao descContact, 
            cat.nome as Categoria
        from contacts c 
        inner join user u on u.id = c.id_user_FK 
        inner join user u1 on u1.id = c.id_contactID_FK 
        inner join category cat on cat.id = c.id_category_FK
        where u.id = :id
        order by c.id;");

        try {
            $stmt->execute([":id" => $idUser]);
            $stmt->fetchAll(PDO::FECTH_ASSOC);
        }

        catch (PDOException $ex) {
            echo $ex;
            return null;
        }
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id_contactID_FK = :id");
        try {
            $stmt->execute(["id" => $id]);
            echo "Sucesso";
        }
        catch(PDOException $e) {
            echo $e;
            return false;
        } 
    }
}