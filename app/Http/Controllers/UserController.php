<?php
namespace App\Http\Controllers;
use App\User;
use App\Http\Resources\UserResource;

class UserController extends Controller{

    public function index() { 
    
        // $users = User::orderBy('created_at', 'desc')->paginate(10);
        $users = User::orderBy('id', 'DESC')->get();
        return UserResource::collection($users);

    }
}
?>