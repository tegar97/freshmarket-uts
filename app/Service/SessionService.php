<?php

namespace tegar\Freshmarket\Service;

use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Domain\Session;
use tegar\Freshmarket\Repository\AdminRepository;
use tegar\Freshmarket\Repository\SessionRepository;

class SessionService
{

    public static string $COOKIE_NAME = "X-FRESHMARKET-SESSION";

    private SessionRepository $sessionRepository;
    private AdminRepository $adminRepository;

    public function __construct(SessionRepository $sessionRepository, AdminRepository $adminRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->adminRepository = $adminRepository;
    }

    public function create(string $userId): Session
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = $userId;

        $this->sessionRepository->save($session);

        setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 24 * 30), "/");

        return $session;
    }

    public function destroy()
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteById($sessionId);

        setcookie(self::$COOKIE_NAME, '', 1, "/");
    }

    public function current(): ?Admin
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findById($sessionId);
        if ($session == null) {
            return null;
        }

        return $this->adminRepository->findById($session->userId);
    }
}
