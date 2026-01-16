<?php

require_once "../repository/ContactRepository.php";

class ContactsController {
    private ContactRepository $repository;

    public function __construct() {
        $this->repository = new ContactRepository();
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

        echo json_encode($data);
    }
}