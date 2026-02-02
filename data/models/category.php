<?php 

class Category {
    private int $id;
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }


    public function setName(string $name): string {
        return $this->name = $name;
    }

    public function setId(int $id): string {
        return $this->id = $id;
    }
}