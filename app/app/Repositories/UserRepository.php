<?php

namespace App\Repositories;
use App\Models\User;


class UserRepository
{
    protected $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function searchByNameRepository($request) {
        $name = $request->name;
        $users = $this->user->where('name', 'like', '%' .$name. '%')->get();
        if (empty($users)) {
            return response()->json([
                "success"=>false,
                "message"=>"Không tìm thấy người dùng phù hợp"
            ]);
        } else {
            $list_user = array();
            foreach($users as $user) {
                $list_user = [
                    "name"=>$user->name,
                    "id"=>$user->id,
                    "gmail"=>$user->email
                ];
            }
            return response()->json([
                "success"=>true,
                "list_user"=>$list_user
            ]);
        }
    }

    public function changeUserNameRepository($request) {
        $uid = auth()->id();
        $new_name = $request->new_name;
        $user = $this->user->find($uid);
        $user->name = $new_name;
        $user->save;
        return response()->json([
            'success'=>true,
            "user_info"=>[
                'name'=>$user->name,
                'email'=>$user->email,
                'id'=>$user->id
            ]
        ]);
    }
}
