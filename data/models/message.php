<?php

class Message {
    private int $id;
    private string $descricao;
    private int $idUserMandante;
    private int $idUserReceptor;

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function getIdUserMandante(): string {
        return $this->idUserMandante;
    }

    public function getIdUserReceptor(): string {
        return $this->idUserReceptor;
    }
    
    public function setIdUserMandante($idUserMandante): void {
        $this->idUserMandante = $idUserMandante;
    }

    public function setIdUserReceptor($idUserReceptor): void {
        $this->idUserReceptor = $idUserReceptor;
    }


}