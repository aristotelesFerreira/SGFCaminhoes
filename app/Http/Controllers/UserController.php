<?php
namespace App\Http\Controllers;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Tymon\JWTAuth\Facades\JWTAuth;
use PHPUnit\Framework\MockObject\Stub\Exception;


class UserController extends Controller{
    

    public function index() { 
    
        // $users = User::orderBy('created_at', 'desc')->paginate(10);
        $users = User::orderBy('id', 'DESC')->get();
        return UserResource::collection($users);
    }

    public function show($uuid) {
        $user = $uuid == "current" ? $user = Auth::user() : User::where('uuid', $uuid)->firstOrFail();

        return new UserResource($user);
    }
    
    public function store(Request $request) {
        $data = $request->all();
        
        $this->validate($request, [
            'name' => 'string|required',
            'email' => 'email|unique:users,email|required',
            'password' => 'required|string|min:6',
            'role' => 'string|required',
            'status' => 'string|nullable',
        ]);
       
        $data['password'] = bcrypt($data['password'] );

        $user = new User($data);
        $user->save();
      
        return new UserResource($user);

    }
    
    public function update ($uuid, Request $request) {

        $data = $request->all();
        $validate = [
            'name' => 'string',
            'email' => 'email|unique:users,email|nullable'
        ];
        if (array_key_exists('password', $data)) {
            $validate = array_merge($validate, [
                'password' => 'required|string',
                'password_old' => 'required|string',
            ]);
        }
        $this->validate($request, $validate);

        try {
            $user = User::where('uuid', $uuid)->firstOrFail();

            if (array_key_exists('password', $data)) {
                if (Hash::check($data['password_old'], $user->password)) {
                    $user->password = (array_key_exists('password', $data)) ? Hash::make($data['password']) : $user->password;
                } else {
                    abort(422);
                }
            }
            
            $user->save();

        }catch(\Exception $e) {
            throw new $e;
        }
      
        return new UserResource($user);
    }


    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
    
}
?>