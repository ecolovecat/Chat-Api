<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginService;
class LoginController extends Controller
{
    //
    protected $loginservice;

    public function __construct(LoginService $loginservice) {
        $this->loginservice = $loginservice;
    }

    public function login(Request $request) {
        $this->loginservice->loginByService($request);
    }
}
