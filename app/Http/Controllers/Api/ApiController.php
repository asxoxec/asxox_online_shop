<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{


    public $token = true;
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
           return  $this->errorResponse('Invalid Email or Password',400);
        }
            return $this->successResponse($jwt_token,200);
    }

    public function me(){
        $user = Auth::user();
        return $this->successResponse(new UserResource($user),200);
    }


    public function register(Request $request){
        $validate = Validator::make(
            $request->all(),
            [
                'name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required|min:8',
                'password2'=>'required|same:password'
            ]
        );
        if($validate->fails()){
            return response()->json([
                'con'=>false,
                'msg'=>"Validation Fail"
            ]);
        }

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        if($this->token){
            return $this->login($request);
        }
        return response()->json([
            'con'=>true,
            'msg'=>"Login Success",
            'data'=>$user
        ],Response::HTTP_OK);

    }

}
