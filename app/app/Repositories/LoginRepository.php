<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginRepository
{
    protected $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function loginByRepository($request) {

        $username = $request->email;
        $pwd = $request->pwd;
        if(Auth::attempt(['email'=>$username,'password'=>$pwd])) {

            return redirect()->route("success-login");

//            $data = $this->user->where('email', $username)->first();
//
//            return response()->json(["success"=>true,
//                "message"=>"Đăng nhập thành công",
//                "token"=>csrf_token(),
//                "user_info"=>["name"=>$data->name,
//                    "email"=>$data->email,
//                    "id"=>$data->id]]);

        } else {
            // đăng nhập thất bại
            return response()->json(["success"=>false, "message"=>"Đăng nhập thất bại"]);
        }




    }




}
