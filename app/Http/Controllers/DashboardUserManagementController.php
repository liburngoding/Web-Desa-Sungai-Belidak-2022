<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class DashboardUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.users.index', [
            'users' => User::latest()->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'username' => 'required|min:5|max:30|unique:users,username',
            'password' => 'required|string|min:5|max:255|confirmed'
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi Berhasil!  Harap Login');
        // return redirect('/login');

        return redirect('/dashboard/users')->with('success', 'Registrasi berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id);

        if($user->is_admin){
            $user->update(['is_admin' => false]);
            return redirect('/dashboard/users')->with('success', 'Berhasil menjadikan user biasa !');
        }else{
            $user->update(['is_admin' => true]);
            return redirect('/dashboard/users')->with('success', 'Berhasil menjadikan admin !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->is_admin)
        {
            return redirect('/dashboard/users')->with(['error' => 'Akun harus user biasa.']);
        }else{
            User::destroy($user->id);
            return redirect('/dashboard/users')->with('success', 'Akun telah dihapus');
        }
    }
}
