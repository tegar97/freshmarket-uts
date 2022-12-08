<?php

namespace tegar\Freshmarket\Repository;

use PHPUnit\Framework\TestCase;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Session;

class SessionRepositoryTest extends TestCase
{
    private SessionRepository $sessionRepository;
    private AdminRepository $AdminRepository;

    protected function setUp(): void
    {
        $this->AdminRepository = new AdminRepository(Database::getConnection());
        $this->sessionRepository = new SessionRepository(Database::getConnection());

        $this->sessionRepository->deleteAll();
        $this->AdminRepository->deleteAll();

        $user = new Admin();
        $user->username = "tegar";
        $user->password = "rahasia";
        $this->AdminRepository->save($user);
    }

    public function testSaveSuccess()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = 1;

        $this->sessionRepository->save($session);

        $result = $this->sessionRepository->findById($session->id);
        self::assertEquals($session->id, $result->id);
        self::assertEquals($session->userId, $result->userId);
    }

    public function testDeleteByIdSuccess()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "eko";

        $this->sessionRepository->save($session);

        $result = $this->sessionRepository->findById($session->id);
        self::assertEquals($session->id, $result->id);
        self::assertEquals($session->userId, $result->userId);

        $this->sessionRepository->deleteById($session->id);

        $result = $this->sessionRepository->findById($session->id);
        self::assertNull($result);
    }

    public function testFindByIdNotFound()
    {
        $result = $this->sessionRepository->findById('notfound');
        self::assertNull($result);
    }
}
