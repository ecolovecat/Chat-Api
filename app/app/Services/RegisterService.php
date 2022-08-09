<?php

namespace App\Services;
use App\Repositories\RegisterRepository;

class RegisterService
{

    protected $registerservice;
    public function __construct(RegisterRepository $registerrepository) {
        $this->registerservice = $registerrepository;
    }

    public function register($request)
    {
        try {
            $request->validate([
                'email' => 'bail|required|email',
                'password' => 'bail|required|min:6',
                're-password'=> 'bail|required|same:password|min:6'

            ]);
            if ($this->registerservice->checkIfEmailExist($request->email) == null) {
                $this->registerservice->registerRepository($request);
                var_dump(response()->json(["Success"=>["success"=>true]]));
            } else {
                var_dump(response()->json(["Fail"=>["success"=>false, "message"=>"Email đã được đăng ký"]])) ;
            }

        } catch (\Exception $e) {
            var_dump(response()->json(["Fail"=>["success"=>false,"message"=>$e->getMessage()]]));
        }



    }
}
