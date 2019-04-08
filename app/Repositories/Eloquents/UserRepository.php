<?php
namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    public function getProfileUser()
    {
        return Auth::user();
    }

    public function updateProfileUser($inputs)
    {
        $user = $this->getProfileUser();

        return $user->update([
            'name' => $inputs['name'],
            'gender' => $inputs['gender'],
            'birthday' => $inputs['birthday'],
            'telephone' => $inputs['telephone'],
        ]);
    }

    public function changePassword($inputs)
    {
        $user = $this->getProfileUser();

        return $user->update([
            'password' => Hash::make($inputs['new_password']),
            'remember_token' => Str::random(60),
        ]);
    }
}