<?php

namespace tegar\Freshmarket\Controller;

use tegar\Freshmarket\app\View;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Model\CategoryResponse;
use tegar\Freshmarket\Repository\CategoryRepository;
use tegar\Freshmarket\Repository\ProductRepository;
use tegar\Freshmarket\Service\CategoryService;
use tegar\Freshmarket\Service\ProductService;

class DasboardController
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


    function Overview()
    {
        $product = $this->productService->getProduct();
        $category = $this->categoryService->getCategory();

        View::render('dasboard/admin/overview', [
            "title" => "Overview",
            'category' => $category,
            'product' => $product,
        ], 'dasboard-mode');
    }
}
