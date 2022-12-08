<?php



namespace tegar\Freshmarket\Service;


use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Category;
use tegar\Freshmarket\Domain\Product;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\AdminLoginRequest;
use tegar\Freshmarket\Model\AdminLoginResponse;
use tegar\Freshmarket\Model\AdminRegisterRequest;
use tegar\Freshmarket\Model\AdminRegisterResponse;
use tegar\Freshmarket\Model\CategoryRequest;
use tegar\Freshmarket\Model\CategoryResponse;
use tegar\Freshmarket\Model\ProductRequest;
use tegar\Freshmarket\Model\ProductResponse;
use tegar\Freshmarket\Repository\AdminRepository;
use tegar\Freshmarket\Repository\CategoryRepository;
use tegar\Freshmarket\Repository\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }



    public function getProduct()
    {

        $product = $this->productRepository->all();
   




        return $product;
    }


    public function getProductDetail(Int $id): Product
    {

        $product = $this->productRepository->findById($id);







        return $product;
    }

    public function addProduct(ProductRequest $request): ProductResponse
    {

        // $this->validateCategoryRequest($request);
        try {
            Database::beginTransaction();
          

            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->categoryId = $request->categoryId;
            $product->image = $request->image;
            
            


            $this->productRepository->save($product);

            $response = new productResponse();
            $response->product = $product;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function updateProduct(ProductRequest $request): ProductResponse
    {
       

        try {
            Database::beginTransaction();

            $product = $this->productRepository->findById($request->id);
            if ($product == null) {
                throw new ValidationException("product is not found");
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->categoryId = $request->categoryId;
            $product->image = $request->image;
            $this->productRepository->update($product);

            Database::commitTransaction();

            $response = new ProductResponse();
            $response->product = $product;
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }
    public function deleteProduct(Int $id)
    {
            
            $category = $this->productRepository->findById($id);
    
            $this->productRepository->delete($category->id);
       
    }
   
}
