<?php

class User {
    private int $id;
    private string $nome;
    private string $descricao;
    private string $telefone;

    public function __construct(string $nome, string $descricao, string $telefone) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->telefone = $telefone;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setName($nome): void {
        $this->nome = $nome;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }
}