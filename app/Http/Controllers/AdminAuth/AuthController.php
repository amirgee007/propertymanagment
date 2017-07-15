<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use function foo\func;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;

class  AuthController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = 'dashboard';
    protected $guard = 'admin';


    public function showLoginForm( ){


        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('admin.auths.login');
    }


        public function logout(){

            Auth::logout();
            return redirect('/');

    }

}
