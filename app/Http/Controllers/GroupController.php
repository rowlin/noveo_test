<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Validator;

class GroupController extends Controller
{

    /*
     *  Function to send json request
     */

    public function sendMessage($code ,$message){
        return  response()->json(["code"=> $code , "message" => $message ], $code);
    }

    /*
     * Return group list
     */

    public function index(){
        $groups =  Group::all();

        if (!$groups) {
            return $this->sendMessage(404, 'Groups not found');
        }
        return  response()->json($groups , 200);

    }

    /*
     * Return group name
     */
    public function fetch($id)
    {
        if (!$id) {
            return $this->sendMessage(400,'Bad Request');
        }
        $group = Group::find($id);
        if(!$group)
            return $this->sendMessage(404,'Group not fount');
        else
            return response()->json($group, 200);
    }

    /**
     * @param Request $request
     * create new group
     * @return mixed
     */

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required '
        ]);

        if ($validator->fails()) {
            return $this->sendMessage( 400 , 'Validation error');
        }

        $group = new Group();
        $group->name = $request->name;
        if ($group->save()) {
            return response()->json([$group] ,201);
        }else
            return $this->sendMessage(400 , "Oops ... mby such Email already registered");
    }

    /**
     * @param Request $request $id
     * modify group info
     * @return mixed
     */

    public function modify(Request $request, $id){

        if (!$id) {;
            return $this->sendMessage('400', 'Invalid Id');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendMessage( 400 , 'Validation error');
        }

        $group = Group::find($id);
        $updater =   $group->update(['name' => $request->name]);
        if ($updater) {
            return response()->json($group ,200);
        }
        return $this->sendMessage(400,'Invalid data' );
    }
    
}
