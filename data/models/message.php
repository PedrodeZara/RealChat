<?php

class Message {
    private int $id;
    private string $descricao;
    private string $telefoneUserMandante;
    private string $telefoneUserReceptor;

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function getTelefoneUserMandante(): string {
        return $this->telefoneUserMandante;
    }

    public function getTelefoneUserReceptor(): string {
        return $this->telefoneUserReceptor;
    }
    
    public function setTelefoneUserMandante($telefoneUserMandante): void {
        $this->telefoneUserMandante = $telefoneUserMandante;
    }

    public function setTelefoneUserReceptor($telefoneUserReceptor): void {
        $this->telefoneUserReceptor = $telefoneUserReceptor;
    }


}