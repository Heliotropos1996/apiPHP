<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Services\Implementation\UserServiceImpl;
use App\Validator\UserValidator;

class UserController extends Controller
{

    /**
     * @var IUserServiceInterface
     */

    private $userService;

    /**
     * @var Request
     */

    private $request;

    private $validator;

    public function __construct(UserServiceImpl $userService, Request $request, UserValidator $validator)
    {
        $this->userService = $userService;
        $this->request = $request;
        $this->validator = $validator;
    }

    public function getAllUsers()
    {

        return $this->userService->getAllUsers();
    }

    public function getUserById(int $id)
    {
        $user = $this->userService->getUserById($id);
        return $this->sendResponse($user, 200);
    }

    public function createUser()
    {
        $validator = $this->validator->validate();

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $this->userService->createUser($this->request->all());
        return response("", 201);
    }

    public function updateUser(int $id)
    {
        $this->userService->updateUser($this->request->all(), $id);
        return response("", 202);
    }

    public function deleteUser(int $id)
    {
        $this->userService->deleteUserint($id);
        return response("", 204);
    }

    public function restoreUser(int $id)
    {
        $this->userService->restoreUser($id);
        return response("", 204);
    }
}
