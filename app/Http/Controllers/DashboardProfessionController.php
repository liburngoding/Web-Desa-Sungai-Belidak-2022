<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class DashboardProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('admin');


        return view('dashboard.villagers.professions.index', [
            'professions' => Profession::first()->paginate(20),
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
            'profession_name' => 'required|min:5|max:255',
        ]);
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required'
        // ]);

        Profession::create($validatedData);

        return redirect('/dashboard/professions')->with('success', 'Jenis Pekerjaan Baru Telah Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('dashboard.villagers.professions.edit', [
            // 'title' => 'Dashboard Data Warga',
            'profession' => $profession,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        $validatedData = $request->validate([
            'profession_name' => 'required|min:3|max:255',
        ]);
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required'
        // ]);

        // Profession::create($validatedData);
        Profession::where('id', $profession->id)->update($validatedData);

        return redirect('/dashboard/professions')->with('success', 'Jenis Pekerjaan Telah Di Edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        Profession::destroy($profession->id);
        return redirect('/dashboard/professions')->with('success', 'Jenis Pekerjaan Telah Dihapus');
    }
}
