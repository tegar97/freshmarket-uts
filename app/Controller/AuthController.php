<?php

namespace tegar\Freshmarket\Controller;

use tegar\Freshmarket\app\View;
use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\AdminLoginRequest;
use tegar\Freshmarket\Repository\AdminRepository;
use tegar\Freshmarket\Repository\SessionRepository;
use tegar\Freshmarket\Service\AdminService;
use tegar\Freshmarket\Service\SessionService;

class AuthController
{



    public function __construct()
    {
        $connection = Database::getConnection();
        $adminReposistory = new AdminRepository($connection);
        $this->adminService = new AdminService($adminReposistory);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $adminReposistory);
    }


    function Login()
    {

        View::render('dasboard/auth/login', [
            "title" => "PHP Login Management"
        ],'auth-mode');
    }

    public function postLogin()
    {
        $request = new AdminLoginRequest();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];

        try {
            $response = $this->adminService->login($request);
            $this->sessionService->create($response->user->id);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('dasboard/auth/login', [
                'title' => 'Login user',
                'error' => $exception->getMessage()
            ],'auth-mode');
        }
    }
}
