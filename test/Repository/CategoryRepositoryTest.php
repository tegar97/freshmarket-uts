<?php

namespace tegar\Freshmarket\Repository;

use PHPUnit\Framework\TestCase;

use tegar\Freshmarket\Config\Database as ConfigDatabase;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Category;
use tegar\Freshmarket\Repository\AdminRepository;

class  CategoryRepositoryTest extends TestCase
{

    private CategoryRepository $categoryRepository;

    protected function setUp(): void
    {


        $this->categoryRepository = new CategoryRepository(ConfigDatabase::getConnection());
        $this->categoryRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $category = new Category();
        $category->name = "daging";
        $category->icon = "icon.png";
        $category->bgColor = "red";

        $this->categoryRepository->save($category);

        $result = $this->categoryRepository->findByName($category->name);

        self::assertEquals($category->name, $result->name);
        self::assertEquals($category->icon, $result->icon);
        self::assertEquals($category->bgColor, $result->bgColor);
    }

    // public function testFindByIdNotFound()
    // {
    //     $user = $this->adminRepository->findByUsername("notfound");
    //     self::assertNull($user);
    // }
}
