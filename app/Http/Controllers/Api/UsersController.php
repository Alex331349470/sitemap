<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $captcha = Cache::get($request->captcha_key);

        if($request->code != $captcha['code']) {
            return $this->response->error('验证码错误', 403);
        }

        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        \Cache::forget($request->captcha_key);

        return $this->response->array($user)->setStatusCode(201);
    }

    public function index()
    {
        $users = User::paginate(10);
        return $this->response->array($users)->setStatusCode(200);
    }
    
}
