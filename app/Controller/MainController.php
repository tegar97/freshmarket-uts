<?php

namespace tegar\Freshmarket\Controller;

use tegar\Freshmarket\app\View;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Repository\CategoryRepository;
use tegar\Freshmarket\Repository\ProductRepository;
use tegar\Freshmarket\Service\CategoryService;
use tegar\Freshmarket\Service\ProductService;

class MainController
{


    private CategoryService $categoryService;
    private ProductService $productService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $categoryRepository = new CategoryRepository($connection);
        $this->categoryService = new CategoryService($categoryRepository);

        $productRepository = new ProductRepository($connection);
        $this->productService = new ProductService($productRepository);
    }


    function index()
    {
        $product = $this->productService->getProduct();
        $category = $this->categoryService->getCategory();

        View::render('main/index', [
            "title" => "Freshmarket",
            'category' => $category,
            'product' => $product
        ], 'main-mode');
    }
}
