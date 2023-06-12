<?php

namespace App\Traits;
trait ResponseMessage
{
    public function success($message,$code)
    {
        return response()->json([
            'status'=>$code,
            'message'=>$message
        ],$code);
    }

    public function error($message,$code)
    {
        return response()->json([
            'status'=>$code,
            'error'=>$message
        ],$code);
    }
}
