<?php

namespace tegar\Freshmarket\Controller;

use tegar\Freshmarket\app\View;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\CategoryRequest;
use tegar\Freshmarket\Repository\CategoryRepository;
use tegar\Freshmarket\Service\CategoryService;

class CategoryController
{



    private CategoryService $categoryService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $categoryRepository = new CategoryRepository($connection);
        $this->categoryService = new CategoryService($categoryRepository);

    }

    function index()
    {

        $category = $this->categoryService->getCategory();

     
     
        View::render('dasboard/admin/category', [
            "title" => "Kategori",
            'category' => $category
            
        ], 'dasboard-mode');
    }

    function add()
    {


        View::render('dasboard/admin/addCategory', [
            "title" => "Tambah Kategori",

        ],
            'dasboard-mode'
        );
    }
    function addPost()
    {
        $request = new CategoryRequest();
        $request->name = $_POST['name'];
        $request->bgColor = $_POST['bgColor'];
        $image_file  = $_FILES['icon'];
        if (!isset($image_file)) {
            die('No file uploaded.');
        }
        $request->icon = $image_file['name'];

      
        try {
            move_uploaded_file(
                // Temp image location
                $image_file["tmp_name"],

                // New image location
                 $_SERVER['DOCUMENT_ROOT'] . "/assets/icon/" . $image_file["name"]
            );

//             echo $_SERVER['DOCUMENT_ROOT'] . "/assets/" . $image_file["name"];
//  ;
//             die('No file uploaded.');
            $this->categoryService->addCategory($request);
                
                View::redirect('/admin/category');
      
        } catch (ValidationException $exception) {
            View::render('dasboard/admin/addCategory', [
                'title' => 'tambah category ',
                'error' => $exception->getMessage()
            ], 'dasboard-mode');
        }
        
    }

    public function edit() {
        
        $parameter = $_SERVER['PATH_INFO'];
        $getId =
        substr($parameter, strrpos($parameter, '/') + 1);
      
        $category = $this->categoryService->getCategoryDetail($getId);
       

        View::render(
            'dasboard/admin/editCategory',
            [
                "title" => "Edit Kategori",
                'category' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'bgColor' => $category->bgColor,
                    'icon' => $category->icon,

                ]

            ],
            'dasboard-mode'
        );
    }
    public function editPost() {
        $parameter = $_SERVER['PATH_INFO'];
        $getId =
            substr($parameter, strrpos($parameter, '/') + 1);
        
        $request = new CategoryRequest();

        $request->id = $getId;
        $request->name = $_POST['name'];
        $request->bgColor = $_POST['bgColor'];
        $image_file  = $_FILES['icon'];
    
       


        try {
            if (!isset($image_file)) {
                $request->icon = $_POST['icon'];

            }else{
                $request->icon = $image_file['name'];
                move_uploaded_file(
                    // Temp image location
                    $image_file["tmp_name"],

                    // New image location
                    $_SERVER['DOCUMENT_ROOT'] . "/assets/icon/" . $image_file["name"]
                );
            }
            

            //             echo $_SERVER['DOCUMENT_ROOT'] . "/assets/" . $image_file["name"];
            //  ;
            //             die('No file uploaded.');
            $this->categoryService->UpdateCategory($request);

            View::redirect('/admin/category');
        } catch (ValidationException $exception) {
            View::redirect('/admin/category');
        }

    }
}
