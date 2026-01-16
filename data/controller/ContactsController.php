<?php

require_once "../repository/ContactRepository.php";

class ContactsController {
    private ContactRepository $repository;

    public function __construct() {
        $this->repository = new ContactRepository();
    }

    public function insert(): void {
        $idC = $_POST['idC'];
        $idCon = $_POST['idCon'];
        $idU = $_POST['idU'];
        
        if(!$idC || $idCon || $idU) {
            http_response_code(400);
            echo json_encode(["error" => "ids inválidos ou não encontrado"]);
            return;
        }

        $data = $this->repository->insert($idC,$idCon,$idU);
        
        if (!$data) {
            http_response_code(402);
            echo json_encode(["error" => "dados não encontrados"]);
            return;
        }

        http_response_code(200);
        echo json_encode(["Sucess" => "Usuário adicionado"]);
    }

    public function search(): array {
        $idUser = $_POST['idU'];
        
        if(!$idUser) {
            http_response_code(400);
            echo json_encode(["error" => "id inválido ou não encontrado"]);
            return;
        }

        $data = $this->repository->select($idUser);
        
        if (!$data) {
            http_response_code(402);
            echo json_encode(["error" => "dados não encontrados"]);
            return;
        }

        http_response_code(200);
        echo json_encode($data);
    }

    public function delete(): array {
        $idUser = $_POST['idU'];
        
        if(!$idUser) {
            http_response_code(400);
            echo json_encode(["error" => "id inválido ou não encontrado"]);
            return;
        }

        $data = $this->repository->delete($idUser);
        
        if (!$data) {
            http_response_code(402);
            echo json_encode(["error" => "dados não encontrados"]);
            return;
        }

        http_response_code(200);
        echo json_encode($data);
    }
}