<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\ResultService;
use PharIo\Version\Exception;
use PhpParser\Node\Expr\New_;

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
