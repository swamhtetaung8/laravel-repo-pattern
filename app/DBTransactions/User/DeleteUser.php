<?php

namespace App\DBTransactions\User;

use App\Classes\DBTransaction;
use App\User;

class DeleteUser extends DBTransaction
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function process()
    {
        $id = $this->id;
        $user = User::find($id);
        $user = $user->delete();
        if($user){
            return ['status' =>true,'error' =>''];
        }else{
            return ['status' =>false,'error' =>'Failed'];
        }
    }
}
