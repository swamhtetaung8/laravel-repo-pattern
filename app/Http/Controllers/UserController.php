<?php

namespace App\Http\Controllers;

use App\DBTransactions\User\DeleteUser;
use App\DBTransactions\User\StoreUser;
use App\DBTransactions\User\UpdateUser;
use Illuminate\Http\Request;
use App\Traits\ResponseMessage;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    use ResponseMessage;
    protected $userInterface;
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success($this->userInterface->getUsers(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeUser = new StoreUser($request);
        $storeUser = $storeUser->executeProcess();
        if($storeUser){
            return $this->success('User created successfully',201);
        }else{
            return $this->error('User creation failed',203);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userInterface->getUser($id);
        if($user){
            return $this->success($user,200);
        }else{
            return $this->error('User not found',404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userInterface->getUser($id);
        if($user){
            $updateUser = new UpdateUser($request,$id);
            $updateUser = $updateUser->executeProcess();
            if($updateUser){
                return $this->success('User updated successfully',200);
            }else{
                return $this->error('User update failed',203);
            }
        }else{
            return $this->error('User not found',404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userInterface->getUser($id);
        if($user){
            $deleteUser = new DeleteUser($id);
            $deleteUser = $deleteUser->executeProcess();
            if($deleteUser){
                return $this->success('User deleted successfully',200);
            }else{
                return $this->error('User update failed',203);
            }
        }else{
            return $this->error('User not found',404);
        }
    }
}
