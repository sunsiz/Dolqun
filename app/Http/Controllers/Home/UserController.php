<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:80',
            'sex' => 'required'
        ], [
            'name.required' => 'ئاكونت نامنى تولدۇرۇڭ',
            'name.max' => 'ئاكونت نامى 80 ھەرپتىن كۆپ بولمىسۇن'
        ]);

        //用户更新资料授权策略 仅允许更新自己的资料
        $this->authorize('update', $user);

        $user->update($data);

        session()->flash('success', 'مەشخۇلات غەلبىلىك بولدى');
        return redirect()->back();
    }

    public function avatar(User $user)
    {
        return view('users.avatar', compact('user'));
    }

    /**
     * 设置用户头像(本地目录)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function avatarStore(Request $request)
    {
        $file = $request->file('img');
        //文件名
        $filename = md5(time()).'.'.$file->getClientOriginalExtension();
        //上传
        $file->move(public_path('avatars'), $filename);

        Auth::user()->avatar = '/avatars/'.$filename;
        Auth::user()->save();

        return response()->json(['url' => '/avatars/'.$filename]);
    }
}
