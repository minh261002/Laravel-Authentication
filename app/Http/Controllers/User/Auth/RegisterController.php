<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index(){
        return view('user.auth.register');
    }

    function register(RegisterRequest $request){
        $credentials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($credentials);

        if($user && $user->wasRecentlyCreated){ 
            return redirect()->route('login')->with('success', 'Đăng ký thành công, Vui lòng đăng nhập');
        }

        return redirect()->back()->with('error','Không thể đăng ký tài khoản, vui lòng thử lại');
    }
}