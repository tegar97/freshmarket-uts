<?php 



namespace tegar\Freshmarket\Service;


use tegar\Freshmarket\Config\Database;
use tegar\Freshmarket\Domain\Admin;
use tegar\Freshmarket\Exception\ValidationException;
use tegar\Freshmarket\Model\AdminLoginRequest;
use tegar\Freshmarket\Model\AdminLoginResponse;
use tegar\Freshmarket\Model\AdminRegisterRequest;
use tegar\Freshmarket\Model\AdminRegisterResponse;
use tegar\Freshmarket\Repository\AdminRepository;

class AdminService{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function createAccount(AdminRegisterRequest $request ) : AdminRegisterResponse {
        $this->validateUserRegistrationRequest($request);


        try{
            Database::beginTransaction();
            $user = $this->adminRepository->findByUsername($request->username);
            if ($user != null) {
                throw new ValidationException("Username already exists");
            }

            $user = new Admin();
            $user->username = $request->username;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);

            $this->adminRepository->save($user);

            $response = new AdminRegisterResponse();
            $response->user = $user;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }

    }

    public function login(AdminLoginRequest $request) : AdminLoginResponse {
        $this->validateUserLoginRequest($request);

        $user = $this->adminRepository->findByUsername($request->username);
        if ($user == null) {
            throw new ValidationException("Username or password is invalid");
        }

        if (!password_verify($request->password, $user->password)) {
            throw new ValidationException("Username or password is invalid");
        }

        $response = new AdminLoginResponse();
        $response->user = $user;

        return $response;

    }
    private function validateUserLoginRequest(AdminLoginRequest $request)
    {
        if (
            $request->username == null || $request->password == null ||
            trim($request->username) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("username, Password can not blank");
        }
    }

    private function validateUserRegistrationRequest(AdminRegisterRequest $request)
    {
        if (
            $request->username == null || $request->password == null ||
           trim($request->username) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("Name, Password can not blank");
        }
    }
 
}