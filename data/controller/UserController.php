<?php
header('Content-Type: application/json');

require_once "../data/repository/UserRepository.php";
require_once "../data/models/user.php";


class UserController {
    private UserRepository $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function select(): void {
        try {   
            $input = json_decode(file_get_contents("php://input"), true);

            $user = $this->repository->getUsers();
            
            if ($user) {
                echo json_encode($user);
            }
            else {
                echo json_encode(["error" => "Não foi possível cadastrar"]);
            }
        }
        
        catch (Exception $ex) {
            echo $ex;
        }
    }   

    public function insert(): void {
        try {   
            $input = json_decode(file_get_contents("php://input"), true);
            $nome = $input['nome'] ?? null;
            $descricao = $input['descricao'] ?? null;
            $telefone = $input['telefone'] ?? null;
            // Adicionar senha
            
            if (!$nome || !$descricao || !$telefone) {
                echo json_encode(["erro" => "dados inválido","nome" => $nome]);
                return;
            }
            
            $user = new User($nome, $descricao, $telefone);

            $valid = $this->repository->insert($user);

            if ($valid) {
                echo json_encode(["sucesso" => "Usuário validado"]);
            }
            else {
                echo json_encode(["error" => "Não foi possível cadastrar"]);
            }
        }
        
        catch (Exception $ex) {
            echo $ex;
        }
    }   

    public function update():void {
        try {   
            $input = json_decode(file_get_contents("php://input"), true);
            $nome = $input['nome'] ?? null;
            $descricao = $input['descricao'] ?? null;
            $telefone = $input['telefone'] ?? null;
            $id = $input['id'] ?? null;

            
            if (!$nome || !$descricao || !$id) {
                echo json_encode(["erro" => "dados inválido"]);
                return;
            }
            

            $user = new User( $nome, $descricao, $telefone);

            $valid = $this->repository->update($user, $id);

            if ($valid) {
                echo json_encode(["sucesso" => "Usuário validado"]);
            }
            else {
                echo json_encode(["error" => "Não foi possível cadastrar"]);
            }
        }
        
        catch (Exception $ex) {
            echo $ex;
        }
    }   

    public function delete():void {
        try {   
            $input = json_decode(file_get_contents("php://input"), true);
            $id = $input['id'] ?? null;

            if (!$id) {
                echo json_encode(["erro" => "dados inválido"]);
                return;
            }

            $valid = $this->repository->delete($id);

            if ($valid) {
                echo json_encode(["sucesso" => "Usuário validado"]);
            }
            else {
                echo json_encode(["error" => "Não foi possível cadastrar"]);
            }
        }
        
        catch (Exception $ex) {
            echo $ex;
        }
    }   
}