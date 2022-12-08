<?php


namespace tegar\Freshmarket\Middleware;

use tegar\Freshmarket\App\View;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Repository\AdminRepository;
use tegar\Freshmarket\Repository\SessionRepository;
use tegar\Freshmarket\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $adminRepository = new AdminRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository, $adminRepository);
    }

    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::redirect('/auth/login');
        }
    }
}
