<?php

namespace tegar\Freshmarket\Repository;

use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Category;
use tegar\Freshmarket\Domain\User;

class CategoryRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    public function save(Category $category): Category
    {
        $statement = $this->connection->prepare("INSERT INTO category(name, icon,bgColor) VALUES (?, ?,?)");
        $statement->execute([
            $category->name, $category->icon, $category->bgColor
        ]);
        return $category;
    }


    public function findById(string $id): ?Category
    {
        $statement = $this->connection->prepare("SELECT id, name,icon,bgColor  FROM category WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {

         
                $category = new Category();
                $category->id = $row['id'];
                $category->name = $row['name'];
                $category->icon = $row['icon'];
                $category->bgColor = $row['bgColor'];
                return $category;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findByName(string $name): ?Category
    {
        $statement = $this->connection->prepare("SELECT id, name,icon,bgColor  FROM category WHERE name = ?");
        $statement->execute([$name]);

        try {
            if ($row = $statement->fetch()) {
                $category = new Category();
                $category->id = $row['id'];
                $category->name = $row['name'];
                $category->icon = $row['icon'];
                $category->bgColor = $row['bgColor'];
                return $category;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function update(Category $category): Category
    {
        $statement = $this->connection->prepare("UPDATE category SET name = ?, bgColor = ? ,icon = ? WHERE id = ?");
        $statement->execute([
            $category->name, $category->bgColor, $category->icon,$category->id
        ]);
        return $category;
    }
    public function deleteAll(): void
    {
        $this->connection->exec("DELETE from category");
    }

    public function all() {
        $result = [];

        $statement = $this->connection->query("SELECT * FROM category");
       
    

            while ($row = $statement->fetch()) {
 

                $result[] = $row;

            }
            return $result;
            // if ($row = $statement->fetch()) {
            //     $category = new Category();
            //     $category->id = $row['id'];
            //     $category->name = $row['name'];
            //     $category->icon = $row['icon'];
            //     $category->bgColor = $row['bgColor'];

            //     echo $category;

            //     return $category;
            // } else {
            //     return null;
            // }
        }
        

   
}
