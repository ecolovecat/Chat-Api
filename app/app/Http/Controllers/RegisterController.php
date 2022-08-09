<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegisterService;
use App\Models\User;

class RegisterController extends Controller
{
    //

    protected $registerservice;
    public function __construct(RegisterService $registerservice) {
        $this->registerservice = $registerservice;
    }

    public function createUser(Request $request) {
        $this->registerservice->register($request);
    }

}
