<?php

namespace App\Http\Controllers;

use App\Models\Villager;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {        
        $laki = Villager::where('gender_id', '1')->count();
        $perempuan = Villager::where('gender_id', '2')->count();

        $islam = Villager::where('religion_id', '1')->count();
        $kristen = Villager::where('religion_id', '2')->count();
        $katholik = Villager::where('religion_id', '3')->count();
        $hindu = Villager::where('religion_id', '4')->count();
        $budha = Villager::where('religion_id', '5')->count();
        $konghucu = Villager::where('religion_id', '6')->count();
        $kttyme = Villager::where('religion_id', '7')->count();
        

        $kepala_keluarga = Villager::where('familyrelation_id', '1')->count();
        $suami = Villager::where('familyrelation_id', '2')->count();
        $istri = Villager::where('familyrelation_id', '3')->count();
        $anak = Villager::where('familyrelation_id', '4')->count();
        $menantu = Villager::where('familyrelation_id', '5')->count();
        $cucu = Villager::where('familyrelation_id', '6')->count();
        $orang_tua = Villager::where('familyrelation_id', '7')->count();
        $mertua = Villager::where('familyrelation_id', '8')->count();
        $famili_lain = Villager::where('familyrelation_id', '9')->count();
        $pembantu = Villager::where('familyrelation_id', '10')->count();
        $lainnya = Villager::where('familyrelation_id', '11')->count();


        $tidak_belum_sekolah = Villager::where('education_id', '1')->count();
        $belum_tamat_sd_sederajat = Villager::where('education_id', '2')->count();
        $tamat_sd_sederajat = Villager::where('education_id', '3')->count();
        $sltp_sederajat = Villager::where('education_id', '4')->count();
        $slta_sederajat = Villager::where('education_id', '5')->count();
        $diploma_i_ii = Villager::where('education_id', '6')->count();
        $akademi_diploma_iii_sarjana_muda = Villager::where('education_id', '7')->count();
        $diploma_iv_strata_i = Villager::where('education_id', '8')->count();
        $strata_ii = Villager::where('education_id', '9')->count();
        $strata_iii = Villager::where('education_id', '10')->count();

        return view('dashboard.home.index', [        
        'laki' => $laki,
        'perempuan' => $perempuan,
        
        
        'islam' => $islam,
        'kristen' => $kristen,
        'katholik' => $katholik,
        'hindu' => $hindu,
        'budha' => $budha,
        'konghucu' => $konghucu,
        'kttyme' => $kttyme,
        
        'kepala_keluarga' => $kepala_keluarga,
        'suami' => $suami,
        'istri' => $istri,
        'anak' => $anak,
        'menantu' => $menantu,
        'cucu' => $cucu,
        'orang_tua' => $orang_tua,
        'mertua' => $mertua,
        'famili_lain' => $famili_lain,
        'pembantu' => $pembantu,
        'lainnya' => $lainnya,

        'tidak_belum_sekolah' => $tidak_belum_sekolah,
        'belum_tamat_sd_sederajat' => $belum_tamat_sd_sederajat,
        'tamat_sd_sederajat' => $tamat_sd_sederajat,
        'sltp_sederajat' => $sltp_sederajat,
        'slta_sederajat' => $slta_sederajat,
        'diploma_i_ii' => $diploma_i_ii,
        'akademi_diploma_iii_sarjana_muda' => $akademi_diploma_iii_sarjana_muda,
        'diploma_iv_strata_i' => $diploma_iv_strata_i,
        'strata_ii' => $strata_ii,
        'strata_iii' => $strata_iii,
        ]);
    }
}
