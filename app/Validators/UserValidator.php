<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\cao.thanh.sang
 * Date: 07/03/2019
 * Time: 14:37
 */

namespace App\Validators;

use App\Rules\NewPasswordMustChanged;
use App\Rules\ValidCurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserValidator extends BaseValidator
{
    protected function updateProfileUser(Request $request)
    {
        return new ValidatorData([
            'name' => ['required', 'max:255'],
            'gender' => ['required'],
            'birthday' => ['required', 'date'],
            'telephone' => ['required', 'regex:(^[0-9]*$)', 'size:10']
        ]);
    }

    protected function changePassword(Request $request)
    {
        $user = Auth::user();

        return new ValidatorData([
            'current_password' => ['required', 'min:8', new ValidCurrentPassword($user)],
            'new_password' => ['required', 'min:8', new NewPasswordMustChanged($user), 'confirmed'],
            'new_password_confirmation' => ['required']
        ]);
    }
}