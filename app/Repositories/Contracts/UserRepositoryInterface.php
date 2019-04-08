<?php
namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getProfileUser();
    public function updateProfileUser($inputs);
    public function changePassword($inputs);
}