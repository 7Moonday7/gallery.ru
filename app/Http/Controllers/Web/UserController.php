<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSignupRequest;
use App\Http\Requests\UserSigninRequest;
use App\Models\Moderator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function auth()
    {
        return view('auth');
    }

    public function signup(UserSignupRequest $request)
    {
        $user = new Moderator();

        $user->login = $request->get('login');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        if (!$user->save()) {
            Session::flash($user, 'error');;
        }

        return redirect()->route('painting.index'); //перенаправление после поста
    }

    public function signin(UserSigninRequest $request)
    {
        $user = Moderator::query()
            ->where('login', '=', $request->get('login'))
            ->first();

        if(!$user || !Hash::check($request->get('password'), $user->password)) {
            Session::flash($user, 'error');;
        }

        return redirect()->route('painting.index'); //перенаправление после поста
    }
}
