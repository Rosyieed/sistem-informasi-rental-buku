<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rentlog = RentLog::with(['user', 'book',])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rentlog' => $rentlog]);
    }

    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    public function registeredUsers()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user = user::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        // return redirect('/user')->with('status', 'Akun berhasil diaktifkan');
        return redirect('/users')->withSuccess('Akun Berhasil Diaktifkan');
    }

}
