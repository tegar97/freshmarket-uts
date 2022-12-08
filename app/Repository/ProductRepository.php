<?php

namespace tegar\Freshmarket\Repository;

use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Category;
use tegar\Freshmarket\Domain\Product;
use tegar\Freshmarket\Domain\User;

class ProductRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    public function save(Product $product): Product
    {
        $statement = $this->connection->prepare("INSERT INTO product(name,description,image,price,category_id,stock) VALUES (?, ?,?,?,?,?)");
        $statement->execute([
            $product->name, $product->description, $product->image, $product->price, $product->categoryId, $product->stock
        ]);
        return $product;
    }
    public function findById(string $id): ?Product
    {
        $statement = $this->connection->prepare("SELECT *  FROM product  WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {


                $product = new Product();
                $product->id = $row['id'];
                $product->name = $row['name'];
                $product->description = $row['description'];
                $product->image = $row['image'];
                $product->price = $row['price'];
                $product->categoryId = $row['category_id'];
                $product->stock = $row['stock'];
                return $product;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function all()
    {
        $result = [];

        $statement = $this->connection->query("SELECT product.*, category.name as category_name,category.icon as category_icon
FROM category
INNER JOIN product ON category.id = product.category_id;
");



        while ($row = $statement->fetch()) {


            $result[] = $row;
        }
        return $result;
    }
    public function update(Product $product): Product
    {
        $statement = $this->connection->prepare("UPDATE product SET  name = ?, description = ?, image = ?, price = ?, category_id = ?, stock = ? WHERE id = ?");
        $statement->execute([$product->name, $product->description, $product->image, $product->price, $product->categoryId, $product->stock, $product->id]);

        return $product;
    }
    public function delete(string $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM product WHERE id = ?");
        $statement->execute([$id]);
    }
}
