<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ForgotPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    function index(){
        return view('user.auth.forgotPassword');
    }

    function forgotPassword(ForgotPasswordRequest $request){
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Vui lòng kiểm tra email')
            : back()->withErrors(['email' => __($status)]);
    }

    function resetForm(){
        return view('user.auth.resetForm');
    }
}