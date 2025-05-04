<?php

namespace App\Services;

use App\Models\User;
use PharIo\Version\Exception;

class UserService
{
    public function RegisterUser($type)
    {
        try {
            $user = User::create([
                'name'     => request('name'),
                'email'    => request('email'),
                'password' => bcrypt(request('password')),
                'user_type'=> $type=='seeker' ?'seeker' : 'employer'
            ]);
            $user->sendEmailVerificationNotification();
        }
        catch (Exception $exception) {
            return New ResultService(false,message: $exception->getMessage());
        }
        return New ResultService(true,'login','تبریک عضو ما شدی :)');
    }
}
