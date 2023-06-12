<?php

namespace App\DBTransactions\User;

use App\Classes\DBTransaction;
use App\User;

class UpdateUser extends DBTransaction
{
    private $request,$id;

    public function __construct($request,$id)
    {
        $this->request = $request;
        $this->id = $id;
    }
    public function process()
    {
            $id = $this->id;
            $request = $this->request;
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user = $user->update();
            if($user){
                return ['status' =>true,'error' =>''];
            }else{
                return ['status' =>false,'error' =>'Failed'];
        }
    }
}
