<?php

namespace App\Repositories;
use App\Models\User;
class RegisterRepository
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }


    public function checkIfEmailExist($email) {
        return User::where('email', $email)->first();
    }

    public function registerRepository($request) {


        User::creat([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
    }

}
