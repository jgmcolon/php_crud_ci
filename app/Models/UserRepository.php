<?php namespace App\Models;



class UserRepository
{

    private array $users;

    public function __construct(array $users = null)
    {
        $this->users =  [
            1 => new User(1, 'user1', '12345','Glenfiddich', 'Twelve', 'user1@gmail.com'),
            2 => new User(2, 'user2', '12345','Oban ', 'Fourteen', 'user2@gmail.com'),
            3 => new User(3, 'user3', '12345','Macallan', 'Twenty-one ', 'user3@gmail.com'),
            4 => new User(4, 'user4', '12345','Johnny', 'Walker', 'user4@gmail.com'),
            5 => new User(5, 'user5', '12345','Jack', 'Daniel', 'user5@gmail.com'),
        ];
    }

    
    public function findAll(): array
    {
        return array_values($this->users);
    }

    
    public function findUserOfId(int $id): ?User
    {
        if (!isset($this->users[$id])) {
            return null;
        }

        return $this->users[$id];
    }

    public function delete(int $id) : void
    {
        unset($this->users[$id]);
    }

    public function SetPassword(int $id, User $user): void
    {
        $this->users[$id] = $user;
    }

    public function update(int $id, User $user): void
    {
        $this->users[$id] = $user;
    }
    
    public function insert(User $user) : void
    {
        $this->users[$user->getId()] = $user;
    }

    public function nextId() : int
    {
        return count($this->users) + 1;
    }
}
