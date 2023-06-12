<?php

namespace App\DBTransactions\User;

use App\Classes\DBTransaction;
use App\User;

class StoreUser extends DBTransaction
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
    public function process()
    {
            $user = new User;
            $request = $this->request;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user = $user->save();

            if($user){
                return ['status' =>true,'error' =>''];
            }else{
                return ['status' =>false,'error' =>'Failed'];
            }
    }
}
