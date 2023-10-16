<?php

namespace App\Services\Implementation;

use App\Models\User;

use App\Services\Interfaces\IUserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements IUserServiceInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function getAllUsers()
    {
        return response($this->model->withTrashed()->get(), 200);
        /*
            si quiero retornar todos los usuarios
            incluyendo los borrados, uso
            model->withTrashed()->get()
        */
    }

    public function getUserById(int $id)
    {
        return $this->model->find($id);
    }

    public function createUser(array $user)
    {
        /*
            le pasamos el password encriptado
        */
        $user['password'] = Hash::make($user['password']);

        $this->model->create($user);
    }

    public function updateUser(array $user, $id)
    {
        $user['password'] = Hash::make($user['password']);
        $this->model->find($id)->update($user);
    }

    public function deleteUserint($id)
    {
        $user = $this->model->find($id);

        /*
            si el usuario existe, lo borramos
        */

        if ($user != null) {
            $user->delete();
        }
    }

    public function restoreUser(int $id)
    {
        $user = $this->model->withTrashed()->find($id);

        /*
            si el usuario existe, lo restauramos
        */

        if ($user != null) {
            $user->restore();
        }
    }
}
