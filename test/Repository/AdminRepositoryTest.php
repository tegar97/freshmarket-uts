<?php

namespace tegar\Freshmarket\Repository;

use PHPUnit\Framework\TestCase;

use tegar\Freshmarket\Config\Database as ConfigDatabase;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Repository\AdminRepository;

class AdminRepositoryTest extends TestCase
{

    private AdminRepository $adminRepository;

    protected function setUp(): void
    {
     

        $this->adminRepository = new AdminRepository(ConfigDatabase::getConnection());
        $this->adminRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $user = new Admin();
        $user->username = "tegar";
        $user->password = "rahasia";

        $this->adminRepository->save($user);

        $result = $this->adminRepository->findByUsername($user->username);

        self::assertEquals($user->username, $result->username);
        self::assertEquals($user->password, $result->password);
    }

    public function testFindByIdNotFound()
    {
        $user = $this->adminRepository->findByUsername("notfound");
        self::assertNull($user);
    }

 
}
