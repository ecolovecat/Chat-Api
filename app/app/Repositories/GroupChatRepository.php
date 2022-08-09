<?php

namespace App\Repositories;

use App\Models\Group;
use App\Models\Message;
use Auth;

class GroupChatRepository
{
    protected $groupchat;
    public function __construct(Group $group) {
        $this->groupchat = $group;
    }
    public function getConversationUserRepository($id) {
        $group = $this->groupchat->find($id);

        $users = $group->users;
        $members = array();
        foreach($users as $user) {

            $uid = $user->id;
            $uname = $user->name;
            $uemail = $user->email;
            $members = [
                "user_id"=>$uid,
                "user_name"=>$uname,
                "user_email"=>$uemail
            ];
        }
        return response()->json([
            "succes"=>true,
            "data"=>$members,
        ]);
    }

    public function getMessagesRepository($id) {
        $conversation = $this->groupchat->find($id)->first();
        $messages = $conversation->messages()->orderBy("created_at", 'DESC')->take(10)->get();
        foreach ($messages as $message) {
            // xu ly data json tra ve
        }
    }

    public function joinConversationRepository($gid, $uid=null) {

        if ($uid == null) {
            $user = Auth::user();
            $group = $this->groupchat->find($gid);
            $check = $group->users()->find($user->id);
            if ($check == null) {
                $group->users()->attach($user->id);

                return response()->json([
                    'success'=> true,
                    'conservation_id'=> $group->id,
                    'conservation_name'=> $group->group_name,
                ]);
            } else {
                echo "Đã tham gia rồi";
                return response()->json([
                    "success"=>false,
                    "message"=>"Bạn đã tham gia nhóm trước đó"
                ]);
            }
        } else {
            $group = $this->groupchat->find($gid);
            $check = $group->users()->find($uid);
            if ($check == null) {
                $group->users()->attach($uid);

                return response()->json([
                    'success'=> true,
                    'user id'=> $uid,
                    'conservation_id'=> $group->id,
                    'conservation_name'=> $group->group_name,
                ]);
            } else {
                return response()->json([
                    "success"=>false,
                    "user_id"=>$uid,
                    "message"=>"Người dùng đã tham gia nhóm trước đó"
                ]);
            }
        }

    }

    public function leaveRepository($request, $uid=null) {
        if ($uid == null) {
            $gid = $request->gid;
            $user = Auth::user();
            $uid = $user->id;

            $check = $user->groups()->find($gid);
            if ($check == null) {
                return response()->json([
                    "success"=>false,
                    "message"=>"Bạn chưa tham gia nhóm này",
                    "conversation_id"=>$gid,
                    "user_id"=>$uid
                ]);
            } else {
                $user->groups()->detach($gid);
                return response()->json([
                    "success"=>true,
                    "message"=>"Bạn đã rời khỏi nhóm",
                    "conversation_id"=>$gid,
                    "user_id"=>$uid
                ]);
            }
        } else {
            $gid = $request->gid;
            $user = User::find($uid);
            $uid = $user->id;

            $check = $user->groups()->find($gid);
            if ($check == null) {
                return response()->json([
                    "success"=>false,
                    "message"=>"Người dùng chưa tham gia nhóm này",
                    "conversation_id"=>$gid,
                    "user_id"=>$uid
                ]);
            } else {
                $user->groups()->detach($gid);
                return response()->json([
                    "success"=>true,
                    "message"=>"Xóa người dùng khỏi nhóm thành công",
                    "conversation_id"=>$gid,
                    "user_id"=>$uid
                ]);
            }
        }

    }
    public function getConversationDataRepository($request) {
        $gid = $request->gid;
        $group = $this->groupchat->find($gid);
        $messages = Message::where('group_id', $gid)->orderBy('created_at', 'DESC')->limit(50);
        $data = array();
        $users = $this->getConversationUserRepository($gid);

        foreach ($messages as $message) {
            $data = [
                "success"=>true,
                "messages"=>[
                    "message_id"=>$message->id,
                    "message_content"=>$message->content,
                    "instime"=>$message->created_at,
                    "sender"=>$message->from,
                ],
                "conversation_id"=>$gid,
                "conversation_name"=>$group->group_name,
                "members"=>$users,
            ];
        }
    }
    public function deleteConversationRepository($request) {
        $gid = $request->gid;
        $group = $this->groupchat->find($gid);
        if ($group) {
            $group->users()->detach();
            return response()->json([
                "success"=>true,
                "group_id"=>$gid
            ]);
        } else {
            return response()->json([
                "success"=>false,
                "message"=>"Nhóm không tồn tại"
            ]);
        }
    }

    public function changeConNameRepository($request) {
        $group = $this->groupchat->find($request->gid);
        if ($group) {
            $group->group_name = $request->new_name;
            $group->save();
            return response()->json([
                "success"=>true,
                "message"=>"Đổi tên nhóm thành công",
                "conversation_id",$group->id,
                "conversation_name",$request->new_name
            ]);
        } else {
            return response()->json([
                "success"=>false,
                "message"=>"Nhóm không tồn tại",
            ]);
        }
    }
}
