<?php

namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
    protected $userservice;
    public function __construct(UserRepository $userrepository) {
        $this->userservice = $userrepository;
    }

    public function searchByNameService($request) {

        try {
            $this->userservice->searchByNameRepository($request);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }
    }

    public function changeUserNameServie($request) {
        try {
            return $this->userservice->changeUserNameRepository($request);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }

    }

}
