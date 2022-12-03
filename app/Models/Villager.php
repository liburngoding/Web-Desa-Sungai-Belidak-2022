<?php

namespace App\Models;

use App\Models\Gender;
use App\Models\Marital;
use App\Models\Religion;
use App\Models\Bloodtype;
use App\Models\Education;
use App\Models\Profession;
use App\Models\Familyrelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Villager extends Model
{
    use HasFactory;

    // public $table = "villagers";

    protected $guarded = ['id'];
    protected $with = ['gender', 'religion', 'education', 'profession', 'bloodtype', 'marital', 'familyrelation'];
// syntax diatas untuk mengatasi N+1 problem (query berlapis)

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {

            return $query->where(function($query) use ($search){
                return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%');
            });

            // return $query
            // ->where('name', 'like', '%' . $search . '%')
            // ->orWhere('nik', 'like', '%' . $search . '%');


        });

        $query->when($filters['gender'] ?? false, function($query, $gender){
            return $query->whereHas('gender', function($query) use ($gender){
                $query->where('id', $gender);
            });
        });
        $query->when($filters['religion'] ?? false, function($query, $religion){
            return $query->whereHas('religion', function($query) use ($religion){
                $query->where('id', $religion);
            });
        });
        $query->when($filters['education'] ?? false, function($query, $education){
            return $query->whereHas('education', function($query) use ($education){
                $query->where('id', $education);
            });
        });
        $query->when($filters['familyrelation'] ?? false, function($query, $familyrelation){
            return $query->whereHas('familyrelation', function($query) use ($familyrelation){
                $query->where('id', $familyrelation);
            });
        });
        $query->when($filters['bloodtype'] ?? false, function($query, $bloodtype){
            return $query->whereHas('bloodtype', function($query) use ($bloodtype){
                $query->where('id', $bloodtype);
            });
        });
        $query->when($filters['marital'] ?? false, function($query, $marital){
            return $query->whereHas('marital', function($query) use ($marital){
                $query->where('id', $marital);
            });
        });
        $query->when($filters['profession'] ?? false, function($query, $profession){
            return $query->whereHas('profession', function($query) use ($profession){
                $query->where('id', $profession);
            });
        });
    }


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }
    public function education()
    {
        return $this->belongsTo(Education::class);
    }
    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
    public function bloodtype()
    {
        return $this->belongsTo(Bloodtype::class);
    }
    public function marital()
    {
        return $this->belongsTo(Marital::class);
    }
    public function familyrelation()
    {
        return $this->belongsTo(Familyrelation::class);
    }
}
