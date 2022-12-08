<?php

namespace tegar\Freshmarket\Controller;

use tegar\Freshmarket\app\View;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\ProductRequest;
use tegar\Freshmarket\Repository\CategoryRepository;
use tegar\Freshmarket\Repository\ProductRepository;
use tegar\Freshmarket\Service\CategoryService;
use tegar\Freshmarket\Service\ProductService;

class ProductController
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
        View::render('dasboard/admin/product', [
            "title" => "Product",
            'product' => $product
        ], 'dasboard-mode');
    }

    public function edit()
    {

        $parameter = $_SERVER['PATH_INFO'];
        $getId =
        substr($parameter, strrpos($parameter, '/') + 1);

        $product = $this->productService->getProductDetail($getId);

        $category = $this->categoryService->getCategory();

        View::render(
            'dasboard/admin/editProduct',
            [
                "title" => "Edit Kategori",
                'category' => $category,
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'categoryId' => $product->categoryId,
                    'image' => $product->image,

                 

                ]

            ],
            'dasboard-mode'
        );
    }
    public function editPost()
    {

        $parameter = $_SERVER['PATH_INFO'];
        $getId =
            substr($parameter, strrpos($parameter, '/') + 1);

        $request = new ProductRequest();
        $request->id = $getId;
        $request->name = $_POST['name'];
        $request->description = $_POST['description'];
        $request->price = $_POST['price'];
        $request->stock = $_POST['stock'];
        $request->categoryId = $_POST['category_id'];
        $image_file  = $_FILES['image'];
        if (!isset($image_file)) {
            die('No file uploaded.');
        }

        $request->image = $image_file['name'];





        try {
            move_uploaded_file(
                // Temp image location
                $image_file["tmp_name"],

                // New image location
                $_SERVER['DOCUMENT_ROOT'] . "/assets/product/" . $image_file["name"]
            );

            //             echo $_SERVER['DOCUMENT_ROOT'] . "/assets/" . $image_file["name"];
            //  ;
            //             die('No file uploaded.');
            $this->productService->updateProduct($request);

            View::redirect('/admin/product');
        } catch (ValidationException $exception) {
            View::redirect('/admin/product');
        }



    }
    function add()
    {

        $category = $this->categoryService->getCategory();
        View::render(
            'dasboard/admin/addProduct',
            [
                "title" => "Tambah Product",
                'category' => $category


            ],
            'dasboard-mode'
        );
    }

    function addPost()
    {
        $request = new ProductRequest();
        $request->name = $_POST['name'];
        $request->description = $_POST['description'];
        $request->price = $_POST['price'];
        $request->stock = $_POST['stock'];
        $request->categoryId = $_POST['category_id'];
        $image_file  = $_FILES['image'];
        if (!isset($image_file)) {
            die('No file uploaded.');
        }
        $request->image = $image_file['name'];

        



        try {
            move_uploaded_file(
                // Temp image location
                $image_file["tmp_name"],

                // New image location
                $_SERVER['DOCUMENT_ROOT'] . "/assets/product/" . $image_file["name"]
            );

            //             echo $_SERVER['DOCUMENT_ROOT'] . "/assets/" . $image_file["name"];
            //  ;
            //             die('No file uploaded.');
            $this->productService->addProduct($request);

            View::redirect('/admin/product');
        } catch (ValidationException $exception) {
            View::redirect('/admin/product');
        }
    }

    function deletePost()
    {
        $parameter = $_SERVER['PATH_INFO'];
        $getId =
            substr($parameter, strrpos($parameter, '/') + 1);
        $this->productService->deleteProduct($getId);
        View::redirect('/admin/product');
    }
}
