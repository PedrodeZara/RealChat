<?php

class MessageController {
    private MessageRepository $repository;

    public function __construct() {
        $this->repository = MessageRepository();
    }

    public function create():void {
        $content = $_POST["descricao"];
        $id_user = $_POST["id_user"];
        $id_contact = $_POST["id_contact"];

        if(!$content || !$id_user || !$id_contact) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Message(null, $content, $id_user, $id_contact);
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
        $id_user = $_POST["id_user"];
        $id_contact = $_POST["id_contact"];

        if(!$id_user || !$id_contact) {
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Message(null, null, $id_user, $id_contact);
        $data = $this->repository->select($message);
        
        if (!data) {
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
        $content = $_POST["descricao"];
        
        if(!$content) {
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Message(null, $content, null, null);
        $data = $this->repository->delete($message);
        
        if (!data) {
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