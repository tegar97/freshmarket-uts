<?php

namespace tegar\Freshmarket\Model;

class ProductRequest
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $image = null;
    public ?string $price = null;
    public ?int $categoryId = null;
}
