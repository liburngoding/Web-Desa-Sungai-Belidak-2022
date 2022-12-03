<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.home.userprofile.edit');
    }
    public function update(Request $request)
    {
        $rules = [
            'name' => (['required','min:4','max:255']),
        ];
        if($request->username != auth()->user()->username){
            $rules['username'] = (['required','min:5','max:20','unique:users,username']);
        }
        $validatedData = $request->validate($rules);
        auth()->user()->update($validatedData);

        return redirect('/dashboard/myprofile')->with('success', 'Profil Akun Telah Diganti');
    }
}
