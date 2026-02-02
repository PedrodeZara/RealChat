<?php

class CategoryController {
    private CategoryRepository $repository;

    public function __construct() {
        $this->repository = new CategoryRepository();
    }

    public function insert():void {
        $input = json_decode(file_get_contents("php://input"), true);
        $name = $input["nome"];

        if(!$name) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Category($name);
        $sucess = $this->repository->insert($message);

        if ($sucess) {
            http_response_code(201);
            echo json_encode(["sucess" => "Categoria inserida"]);
        }
        else {
            http_response_code(401);
            echo json_encode(["error" => "insert problem"]);
        }

    }

    public function select():void {
        $sucess = $this->repository->select();

        if ($sucess) {
            http_response_code(201);
            echo json_encode($sucess);
        }
        else {
            http_response_code(401);
            echo json_encode(["error" => "insert problem"]);
        }

    }

    public function delete() {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input["id"];

        if(!$id) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Category($id);
        $message->setId($id);

        $sucess = $this->repository->delete($id);

        if ($sucess) {
            http_response_code(201);
            echo json_encode(["sucess" => "deletado"]);
        }
        else {
            http_response_code(401);
            echo json_encode(["error" => "problema ao excluir"]);
        }

    }


}