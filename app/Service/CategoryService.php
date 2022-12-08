<?php



namespace tegar\Freshmarket\Service;


use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Category;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\AdminLoginRequest;
use tegar\Freshmarket\Model\AdminLoginResponse;
use tegar\Freshmarket\Model\AdminRegisterRequest;
use tegar\Freshmarket\Model\AdminRegisterResponse;
use tegar\Freshmarket\Model\CategoryRequest;
use tegar\Freshmarket\Model\CategoryResponse;
use tegar\Freshmarket\Repository\AdminRepository;
use tegar\Freshmarket\Repository\CategoryRepository;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    

    public function getCategory()
    {

        $category = $this->categoryRepository->all();
     

    
    
    
        return $category;
    }


    public function getCategoryDetail(Int $id) : Category 
    {

        $category = $this->categoryRepository->findById($id);

      

      
        


        return $category;
    }

    public function addCategory(CategoryRequest $request): CategoryResponse
    {

        $this->validateCategoryRequest($request);
        try {
            Database::beginTransaction();
            $category = $this->categoryRepository->findByName($request->name);
            if ($category != null) {
                throw new ValidationException("Kategori already exists");
            }

            $category = new Category();
            $category->name = $request->name;
            $category->bgColor = $request->bgColor;
            $category->icon = $request->icon;


            $this->categoryRepository->save($category);

            $response = new CategoryResponse();
            $response->category = $category;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }
  
    public function UpdateCategory(CategoryRequest $request): CategoryResponse
    {

        try {
            Database::beginTransaction();

            $category = $this->categoryRepository->findById($request->id);
            if ($category == null) {
                throw new ValidationException("category is not found");
            }

            $category->id = $request->id;
            $category->name = $request->name;
            $category->icon = $request->icon;
            $category->bgColor = $request->bgColor;
            $this->categoryRepository->update($category);

            Database::commitTransaction();

            $response = new CategoryResponse();
            $response->category = $category;
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }
    private function validateCategoryRequest(CategoryRequest $request)
    {
        if (
            $request->name == null || $request->bgColor == null
            || $request->icon == null ||
            trim($request->name) == "" || trim($request->bgColor) == ""  ||  trim($request->icon) == "" 
        ) {
            throw new ValidationException("nama , background color , icon tidak boleh kosong");
        }
    }
    
   
   
}
