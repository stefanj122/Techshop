<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserService
{

    public function show(string $id): View|Factory
    {
        $user = User::query()->findOrFail($id);
        return view('admin.user.profile', ['user'=>$user]);
    }

    public function update(string $id): RedirectResponse
    {
        request()->validate(
            ['username' => 'required|min:2',
            'email'=> 'email|required',
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'avatar' => 'image',
            ]
        );
        $file = request()->file('avatar');
        $name = $file->storeAs(null, Str::uuid()->toString().'.'.$file->getClientOriginalExtension(), 'avatar');
        $user = User::query()->update(
            ['username' => request()->username,
            'email'=> request()->email,
            'firstName' => request()->firstName,
            'lastName' =>  request()->lastName,
            'avatar' => $name,
            ]
        );
        return redirect()->route('user.show', $id)->with('status', 'Successfully updated!');
    }

    public function changePassword(string $id): RedirectResponse
    {
        request()->validate(
            [
            'password' => 'current_password',
            'newpassword' => 'required|min:4',
            'renewpassword' => 'same:newpassword',
            ]
        );
        $password = Hash::make(request()->newpassword);
        User::query()->update(['password' => $password]);
        return redirect()->route('user.show', $id)->with('status', 'Successfully updated!');
    }
}
