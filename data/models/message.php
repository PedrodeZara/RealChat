<?php

class Message {
    private int $id;
    private string $descricao;
    private int $idUserMandante;
    private int $idUserReceptor;

    public function __construct(int $id, string $descricao, int $idUserMandante, int $idUserReceptor) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->idUserMandante = $idUserMandante;
        $this->idUserReceptor = $idUserReceptor;
    }

    public function getDescricao(): string {
        return $this->$descricao;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function getIdUserMandante(): string {
        return $this->$idUserMandante;
    }

    public function getIdUserReceptor(): string {
        return $this->$idUserReceptor;
    }

}