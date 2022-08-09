<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    //
    protected $userservie;
    public function __construct(UserService $userservice) {
        $this->userservie = $userservice;
    }

    public function searchByName(Request $request) {
        $this->userservie->searchByNameService($request);
    }

    public function changeUserName(Request $request) {
        $this->userservie->changeUserNameServie($request);
    }
}
