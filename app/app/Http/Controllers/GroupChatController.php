<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\GroupChatService;
use App\Models\Group;
use Auth;


class GroupChatController extends Controller
{
    //
    protected $groupchatservice;
    public function __construct(GroupChatService $groupchatservice) {
        $this->groupchatservice = $groupchatservice;
    }

    public function getConversationUser($gid=1) {
        $this->groupchatservice->getConversationUserService($gid);
    }

    public function getMessages($conversation_id ) {
        $this->groupchatservice->getMessagesService($conversation_id);
    }
//
    public function createMessage($conversation_id) {

        $user = Auth::user();
        dd($user);
        $conversation = Group::find($conversation_id);
        $message = new Message();
        $message->from = $user->id;
        $message->is_deleted = false;
        $message->content = "this is test mess 8";
        return $conversation->messages()->save($message);

    }

    /*$user = Auth::user();
        $conversation = Group::find($conversation_id);
        $message = new Message();
        $message->from = $user->id;
        $message->is_deleted = false;
        $message->content = "this is test mess";
        return $conversation->messages()->save($message);*/


    public function joinConversation($group_id, $user_id) {
        return $this->groupchatservice->joinConversationService($group_id, $user_id);
    }

    public function addListUser(Request $request) {
        $user_ids = explode(",", $request->list_id);
        foreach($user_ids as $id) {
            var_dump($this->groupchatservice->joinConversationService($request->gid,(int)$id));
        }
    }

    public function leaveConversation(Request $request) {
        $this->groupchatservice->leaveService($request);
    }

    public function removeListUser(Request $request) {
        $user_ids = explode(",", $request->list_id);
        foreach($user_ids as $id) {
            var_dump($this->groupchatservice->leaveService($request,(int)$id));
        }
    }

    public function getConversationData(Request $request) {
        $this->groupchatservice->getConversationDataService($request);
    }

    public function deleteConversation(Request $request) {
        $this->groupchatservice->deleteConversationService($request);
    }

    public function changeConName(Request $request) {
        $this->groupchatservice->changeConNameService($request);
    }
}
