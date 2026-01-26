<?php

require_once "../data/repository/UserRepository.php";
require_once "../data/models/user.php";

class UserController {
    private UserRepository $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function select(): void {
        try {   
            $telefone = $_POST['telefone'] ?? null;
            // Adicionar senha
            
            if (!$telefone) {
                echo json_encode(["erro" => "dados inválido"]);
                return;
            }

            $user = $this->repository->getByNumber($telefone);

            if ($valid) {
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
            $nome = $_POST['nome'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $telefone = $_POST['telefone'] ?? null;
            // Adicionar senha
            
            if (!$nome || !$descricao || !$telefone) {
                echo json_encode(["erro" => "dados inválido"]);
                return;
            }
            
            $user = new User(null, $nome, $descricao, $telefone);

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
            $nome = $_POST['nome'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $telefone = $_POST['telefone'] ?? null;
            $id = $_POST['id'] ?? null;

            
            if (!$nome || !$descricao) {
                echo json_encode(["erro" => "dados inválido"]);
                return;
            }
            
            $user = new User(null, $nome, $descricao, $telefone);

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
            $id = $_POST['id'] ?? null;

            if (!id) {
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