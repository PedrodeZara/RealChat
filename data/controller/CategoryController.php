<?php

class CategoryController {
    private ategoryRepository $repository;

    public function __construct() {
        $this->repository = MategoryRepository();
    }

    public function create():void {
        $name = $_POST["nome"];

        if(!$name) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Category(null, $name);
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

    public function search():void {
        $id = $_POST["id"];

        if(!$id) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Category($id, null);
        $sucess = $this->repository->select($message);

        if ($sucess) {
            http_response_code(201);
            echo json_encode(["sucess" => "post message"]);
        }
        else {
            http_response_code(401);
            echo json_encode(["error" => "insert problem"]);
        }

    }

    public function delete():void {
        $id = $_POST["id"];

        if(!$id) {
            http_response_code(400);
            echo json_encode(['erro' => 'dados invalidos']);
            return;
        }

        $message = new Category($id, null);
        $sucess = $this->repository->delete($id);

        if ($sucess) {
            http_response_code(201);
            echo json_encode(["sucess" => "post message"]);
        }
        else {
            http_response_code(401);
            echo json_encode(["error" => "insert problem"]);
        }

    }


}