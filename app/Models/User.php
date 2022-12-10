<?php namespace App\Models;

use JsonSerializable;


class User  implements JsonSerializable
{
    private ?int $id;

    private string $username;

    private string $password;

    private string $firstName;

    private string $lastName;

    private string $email;

    public function __construct(?int $id, string $username, string $password, string $firstName, string $lastName, string $email)
    {
        $this->id = $id;
        $this->password = sha1(md5($password));
        $this->username = strtolower($username);
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
        $this->email = strtolower($email);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername($val)
    {
        $this->username = $val;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName($val)
    {
        $this->firstName = $val;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName($val)
    {
        $this->lastName = $val;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($val)
    {
        $this->email = $val;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
        ];
    }
}
