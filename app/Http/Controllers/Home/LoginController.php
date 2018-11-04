<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('users.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->remember)) {

            if(Auth::user()->is_activated) {

                //每天登陆增加经验值
                //$this->setExp(Auth::user()->id);

                //Auth::user()->update(['last_login_at' => date('Y-m-d H:i:s')]);
                session()->flash('success', 'خۇش كەپسىز!');
                return redirect()->route('home');
            } else {
                Auth::logout();
                session()->flash('warning', 'ئاكونتىڭىز تېخى ئاكتىپلانمىغان ، ئېلخەتكە كىرىپ ئاكتىپلاڭ');
                return redirect()->back();
            }

        }else{
            session()->flash('danger', 'ئېلخەت ياكى پارول خاتا');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'يەنە كىلىشىڭىزنى قارشى ئالىمىز!');
        return redirect('/');
    }
}
