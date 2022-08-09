<?php

namespace App\Services;
use App\Repositories\GroupChatRepository;
use http\Env\Response;


class GroupChatService
{
    protected $groupchatservice;
    public function __construct(GroupChatRepository $groupchatrepository) {
        $this->groupchatservice = $groupchatrepository;
    }

    public function getConversationUserService($id) {

        try {
            $this->groupchatservice->getConversationUserRepository($id);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }


    }

    public function getMessagesService($id) {

        try {
            $this->groupchatservice->getMessagesRepository($id);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }

    }

    public function joinConversationService($gid, $uid) {
        try {
            return $this->groupchatservice->joinConversationRepository($gid, $uid);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }
    }

    public function leaveService($request,$uid) {

        try {
            return $this->groupchatservice->leaveRepository($request,$uid);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }

    }

    public function getConversationDataService($request) {
        try {
            return $this->groupchatservice->getConversationDataRepository($request);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }

    }

    public function deleteConversationService($request) {
        try {
            return $this->groupchatservice->deleteConversationRepository($request);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }

    }

    public function changeConNameService($request) {
        try {
            return $this->groupchatservice->changeConNameRepository($request);
        } catch(\Exception $e) {
            return response()->json(["Success"=>false, "message"=>$e->getMessage()]);
        }

    }


}
