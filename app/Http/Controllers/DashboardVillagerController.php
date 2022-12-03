<?php

namespace App\Http\Controllers;

use App\Models\Villager;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\Education;
use App\Models\Profession;
use App\Models\Bloodtype;
use App\Models\Marital;
use App\Models\Familyrelation;

use Illuminate\Http\Request;

class DashboardVillagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.villagers.index', [
        'villagers' => Villager::latest()->filter(request(['gender','religion','education','familyrelation','bloodtype','marital','profession','search']))->paginate(20)->withQueryString(),
        'villagerscount' => Villager::filter(request(['gender','religion','education','familyrelation','bloodtype','marital','profession','search']))->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.villagers.create', [
            'genders' => Gender::all(),
            'religions' => Religion::all(),
            'educations' => Education::all(),
            'professions' => Profession::all(),
            'bloodtypes' => Bloodtype::all(),
            'maritals' => Marital::all(),
            'familyrelations' => Familyrelation::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:125',
            'NIK' => 'required|unique:villagers|numeric|digits:16',
            'birthplace' => 'required|min:2|max:60',
            'birthdate' => 'required|date|after:01-01-1900|before_or_equal:today',
            'gender_id' => 'required',
            'religion_id' => 'required',
            'education_id' => 'required',
            'profession_id' => 'required',
            'bloodtype_id' => 'required',
            'marital_id' => 'required',
            'maritaldate' => 'nullable|date|after:birthdate|before_or_equal:today',
            'familyrelation_id' => 'required',
            'father_name' => 'required|string|min:2|max:125',
            'mother_name' => 'required|string|min:2|max:125',
        ]);

        // $request->dd();
        Villager::create($validatedData);
        return redirect('/dashboard/villagers')->with('success', 'Data Warga Baru Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Villager $villager)
    {
        return view('dashboard.villagers.edit', [
            'villager' => $villager,
            'genders' => Gender::all(),
            'religions' => Religion::all(),
            'educations' => Education::all(),
            'professions' => Profession::all(),
            'bloodtypes' => Bloodtype::all(),
            'maritals' => Marital::all(),
            'familyrelations' => Familyrelation::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Villager $villager)
    {
        $rules = [
            'name' => 'required|string|min:2|max:125',
            'birthplace' => 'required|min:2|max:60',
            'birthdate' => 'required|date|after:01-01-1900|before_or_equal:today',
            'gender_id' => 'required',
            'religion_id' => 'required',
            'education_id' => 'required',
            'profession_id' => 'required',
            'bloodtype_id' => 'required',
            'marital_id' => 'required',
            'maritaldate' => 'nullable|date|after:birthdate|before_or_equal:today',
            'familyrelation_id' => 'required',
            'father_name' => 'required|string|min:2|max:125',
            'mother_name' => 'required|string|min:2|max:125',
        ];


        if($request->NIK != $villager->NIK){
            $rules['NIK'] = 'required|unique:villagers|numeric|digits:16';
        }
        $validatedData = $request->validate($rules);
        // $request->dd();
        Villager::where('id', $villager->id)
            ->update($validatedData);
        return redirect('/dashboard/villagers')->with('success', 'Data Warga Telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Villager $villager)
    {
        Villager::destroy($villager->id);
        return redirect('/dashboard/villagers')->with('error', 'Data Warga Telah Dihapus');
    }
}
