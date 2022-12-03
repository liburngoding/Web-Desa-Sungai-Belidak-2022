<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardPasswordController extends Controller
{
    public function edit()
    {
        return view('dashboard.home.userprofile.password.edit');
    }
    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:5|max:255|confirmed'
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)){
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('success', 'Kamu Sukses Mengganti Password');
        }else{
            // return back()->withErrors('old_password', 'Ada Salah di Password');
            return back()->withErrors(['old_password' => 'Pastikan mengisi password saat ini']);
        }
    
    }
}
