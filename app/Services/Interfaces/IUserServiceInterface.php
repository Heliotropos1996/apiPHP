<?php

namespace App\Services\Interfaces;

interface IUserServiceInterface
{
    public function getAllUsers();

    /**
     * 
     * @param int $id
     * @return array User
     */

    public function getUserById(int $id);

    /**
     * 
     * @param array $user
     * @return User
     */

    public function createUser(array $user);

    /**
     * 
     * @param array $user
     * @param int $id
     */

    public function updateUser(array $user, $id);

    /**
     * 
     * @param int $id
     * @return boolean
     */
    
    public function deleteUserint ($id);

    /**
     * 
     * @param int $id
     * @return boolean
     */
    public function restoreUser(int $id);
}