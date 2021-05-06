<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

//Entity
class Author
{
    private int $id;
    private string $surname;
    private string $name;

    public function __construct(int $id, string $surname, string $name)
    {
        $this->id = $id;
        $this->surname = $surname;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
