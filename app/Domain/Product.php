<?php

namespace tegar\Freshmarket\Domain;

class Product
{
    public int $id;
    public string $name ;
    public string $description ;
    public string $image ;
    public string $price ;
    public int $categoryId ;
    public string $categoryName;
}
