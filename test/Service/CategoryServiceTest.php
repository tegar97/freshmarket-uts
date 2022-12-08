<?php

namespace tegar\Freshmarket\Service;

use PHPUnit\Framework\TestCase;

use tegar\Freshmarket\Model\AdminRegisterRequest;

use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\AdminLoginRequest;
use tegar\Freshmarket\Repository\AdminRepository;
use tegar\Freshmarket\Repository\SessionRepository;

class AdminServiceTest extends TestCase
{
    private AdminRepository $adminRepository;
    private AdminService $adminService;
    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {

        $connection = Database::getConnection();

        $this->adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($this->adminRepository);
        $this->sessionRepository = new SessionRepository($connection);


        $this->sessionRepository->deleteAll();
        $this->adminRepository->deleteAll();
    }

    public function testGetAll()
    {
        $request = new AdminRegisterRequest();
        $request->username = "tegar ";
        $request->password = "rahasia";

        $response = $this->adminService->createAccount($request);

        self::assertEquals($request->username, $response->user->username);
        self::assertNotEquals($request->password, $response->user->password);

        self::assertTrue(password_verify($request->password, $response->user->password));
    }

}
