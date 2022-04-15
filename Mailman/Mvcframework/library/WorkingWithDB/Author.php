<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

//Entity
class Author
{
    private ?int $id;
    public string $surname;
    public string $name;
    private string $login;
    public string $password;
    //public ?string $photo = null;
    public string $photo = '';

    public function __construct(string $surname, string $name, string $login, ?int $id = null, string $password = '')
    {
        $this->id = $id;
        $this->surname = $surname;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
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

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
