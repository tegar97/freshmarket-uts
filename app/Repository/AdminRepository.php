<?php

namespace tegar\Freshmarket\Repository;

use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\User;

class AdminRepository{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    public function save(Admin $admin): Admin
    {
        $statement = $this->connection->prepare("INSERT INTO admin(username, password) VALUES (?, ?)");
        $statement->execute([
           $admin->username, $admin->password
        ]);
        return $admin;
    }

    public function findByUsername(string $username): ?Admin
    {
        $statement = $this->connection->prepare("SELECT id, username, password FROM admin WHERE username = ?");
        $statement->execute([$username]);

        try {
            if ($row = $statement->fetch()) {
                $user = new Admin();
                $user->id = $row['id'];
                $user->username = $row['username'];
                $user->password = $row['password'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findById(string $id): ?Admin
    {
        $statement = $this->connection->prepare("SELECT id, username, password FROM admin WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $user = new Admin();
                $user->id = $row['id'];
                $user->username = $row['username'];
                $user->password = $row['password'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }


    public function deleteAll(): void
    {
        $this->connection->exec("DELETE from admin");
    }

}
