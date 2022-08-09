<?php
namespace App\Services;
use App\Repositories\LoginRepository;
use Auth;
class LoginService
{
    protected $loginservice;
    public function __construct(LoginRepository $loginrepository) {
        $this->loginservice = $loginrepository;
    }


    public function loginByService($request) {


        try {
            $request->validate([
                'email' => 'required|email',
                'pwd' => 'required|min:6'
            ]);
            $this->loginservice->loginByRepository($request) ;


        } catch(\Exception $e) {
//            return response()->json(["success"=>false,"message"=>$e->getMessage()]);
            var_dump(response()->json(["success"=>false,"message"=>$e->getMessage()]));
        }

    }
}
