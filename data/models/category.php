<?php 

class Category {
    private int $id;
    private string $name;

    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }


    public function setName(string $name): string {
        return $this->name = $name;
    }
}