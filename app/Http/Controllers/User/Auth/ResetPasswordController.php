<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    function index(Request $request){
        $token = $request->route('token');
        $email = $request->query('email');

        return view('user.auth.resetForm', compact('token', 'email'));
    }

    function resetPassword(ResetPasswordRequest $request){
        
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Cập nhật mật khẩu thành công');
    }
}