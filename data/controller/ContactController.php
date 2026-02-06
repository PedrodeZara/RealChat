<?php
require_once "../data/repository/ContactRepository.php";

class ContactController {
    private ContactRepository $repository;

    public function __construct() {
        $this->repository = new ContactRepository();
    }

    public function insert(): void {
        $input = json_decode(file_get_contents("php://input"), true);
        $idCategory = $input['idCategory'];
        $idContact = $input['idContact'];
        $idUser = $_SESSION['id_user'];
        
        if(!$idCategory || !$idContact || !$idUser) {
            http_response_code(400);
            echo json_encode(["error" => "ids inválidos ou não encontrado"]);
            return;
        }

        $data = $this->repository->insert($idCategory,$idContact,$idUser);
        
        if (!$data) {
            http_response_code(402);
            echo json_encode(["error" => "dados não encontrados"]);
            return;
        }

        http_response_code(200);
        echo json_encode(["Sucess" => "Usuário adicionado"]);
    }

    public function search() {
        /*$idUser = $_POST['idUser'];*/
        $idUser = $_SESSION['id_user'];
        
        if(!$idUser) {
            http_response_code(400);
            echo json_encode(["error" => "id inválido ou não encontrado", "id" => $idUser]);
            return;
        }

        $data = $this->repository->select($idUser);
        
        if (!$data) {
            http_response_code(402);
            return;
        }

        http_response_code(200);
        echo json_encode($data);
    }

    public function delete() {
        $input = json_decode(file_get_contents("php://input"), true);
        $idUser = $input['idUser'];
        
        if(!$idUser) {
            http_response_code(400);
            echo json_encode(["error" => "id inválido ou não encontrado", "idUser" => $idUser]);
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