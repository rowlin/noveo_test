<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{


    /*
     *  Function to send json request
     */

    public function sendMessage($code ,$message){
        return  response()->json(["code"=> $code , "message" => $message ], $code);
    }

    /*
     * Return users list
     */

    public function index(){
        $users =  User::all();
      
        if (!$users) {
            return $this->sendMessage(404, 'Users not found');
        }
        return  response()->json($users , 200);
    }

    /*
     * Return user information
     */
    public function fetch($id)
    {
        if (!$id) {
            return $this->sendMessage(400,'Bad Request');
        }
        $user = User::find($id);
        if(!$user)
            return $this->sendMessage(404,'User not fount');
        else
            return response()->json($user, 200);
    }

    /**
     * @param Request $request
     * create new user
     * @return mixed
     */

    public function create(Request $request)
    {


         $validator = Validator::make($request->all(), [
            'first_name' => 'required | min: 3',
            'last_name' => 'required | min: 3',
            'email' => 'required '
        ]);

        if ($validator->fails()) {
            return $this->sendMessage( 400 , 'Validation error');
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->state = 1;//default set true
        if ($user->save()) {
            return response()->json([$user] ,201);
        }else
            return $this->sendMessage(400 , "Oops ... mby such Email already registered");
    }

    /**
     * @param Request $request $id
     * modify user info
     * @return mixed
     */


    public function modify(Request $request, $id){

        if (!$id) {;
            return $this->sendMessage('400', 'Invalid Id');
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required | min: 3',
            'last_name' => 'required | min: 3',
            'email' => 'required '
        ]);

        if ($validator->fails()) {
            return $this->sendMessage( 400 , 'Validation error');
        }

        $user = User::find($id);
        $updater =   $user->update(['first_name' => $request->first_name,
                                    'last_name' => $request->last_name,
                                    'email' => $request->email]);
        if ($updater) {
            return response()->json($user ,200);
        }
        return $this->sendMessage(400,'Invalid data' );
    }




}
