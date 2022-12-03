<?php

namespace App\Http\Controllers;

use App\Models\Marital;
use Illuminate\Http\Request;

class DashboardMaritalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.villagers.maritals.index', [
            // 'title' => 'Dashboard Data Warga',
        'maritals' => Marital::first()->paginate(20),
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
            'marital_name' => 'required|min:5|max:255',
        ]);
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required'
        // ]);

        Marital::create($validatedData);

        return redirect('/dashboard/maritals')->with('success', 'Status Pernikahan Baru Telah Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marital  $marital
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function edit(Marital $marital)
    {
        return view('dashboard.villagers.maritals.edit', [
            // 'title' => 'Dashboard Data Warga',
            'marital' => $marital,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marital $marital)
    {
        $validatedData = $request->validate([
            'marital_name' => 'required|min:5|max:255',
        ]);
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required'
        // ]);

        // marital::create($validatedData);
        marital::where('id', $marital->id)->update($validatedData);

        return redirect('/dashboard/maritals')->with('success', 'Jenis Pekerjaan Telah Di Edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marital $marital)
    {
        Marital::destroy($marital->id);
        return redirect('/dashboard/maritals')->with('success', 'Status Perkawinan Telah Dihapus');
    }
}
