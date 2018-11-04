<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('users.register');
    }

    public function store(RegisterRequest $registerRequest)
    {
        //创建用户
        $user = User::create([
            'name' => $registerRequest->get('name'),
            'email' => $registerRequest->get('email'),
            'password' => bcrypt($registerRequest->get('password')),
            'api_token' => str_random(80),
        ]);

        //发送激活邮件
        //$this->sendAccountConfirmationEmailTo($user);
        Auth::login($user);
        session()->flash('success', 'تېزىملاشنى تەستىقلاش ئۇلانمىسى سىز تولدۇرغان ئېلخەتكە يوللاندى ، ئېلخەتكە كىرىپ ئۇلانمىنى چىكىپ داۋاملاشتۇرۇڭ!');
        return redirect()->back();
    }

    protected function sendAccountConfirmationEmailTo($user)
    {
        $view = 'emails.register_confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢注册[Dolqun Terjimiliri],请确认你的邮箱。";
        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    /**
     * 用户在邮箱当中点击激活链接后进行激活
     * @param $token 激活标识
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->is_activated = true;
        $user->activation_token = null;

        $user->save();

        //自动登录当前激活的用户
        Auth::login($user);

        session()->flash('success', 'ئاكونت تېزىملاش غەلبىلىك بولدى !');
        return redirect()->route('home');
    }
}
