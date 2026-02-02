<?php
require_once "../data/repository/MessageRepository.php";
require_once "../data/models/message.php";


class MessageController {
    private MessageRepository $repository;

    public function __construct() {
        $this->repository = new MessageRepository();
    }

    public function insert():void {
        $input = json_decode(file_get_contents("php://input"), true);

        $content = $input["descricao"];
        $id_user = $input["id_user"];
        $id_contact = $input["id_contact"];

        if(!$content || !$id_user || !$id_contact) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Message();
        $message->setIdUserMandante($id_user);
        $message->setIdUserReceptor($id_contact);
        $message->setdescricao($content);

        $sucess = $this->repository->insert($message);

        if ($sucess) {
            http_response_code(201);
            echo json_encode(["sucess" => "post message"]);
        }
        else {
            http_response_code(401);
            echo json_encode(["error" => "insert problem"]);
        }

    }

    public function select() {
        $input = json_decode(file_get_contents("php://input"), true);
        $id_user = $input["id_user"];
        $id_contact = $input["id_contact"];

        if(!$id_user || !$id_contact) {
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Message();
        $message->setIdUserMandante($id_user);
        $message->setIdUserReceptor($id_contact);
        $data = $this->repository->select($message);
        
        if (!$data) {
            http_response_code(404);
            echo json_encode(['error' => 'user not found']);
            return;
        }
        else {
            http_response_code(200);
            echo json_encode($data);
        }

    }

    public function delete(): void {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input["id"];

        if(!$id) {
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $data = $this->repository->delete($id);
        
        if (!$data) {
            http_response_code(404);
            echo json_encode(['error' => 'message not found']);
            return;
        }
        else {
            http_response_code(200);
            echo json_encode($data);
        }

    }


}