<?php

namespace App\Models;

use App\Models\Villager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    public $table = "educations";
    // pake public $table karna laravel ngga ngerti pake tabel yg mana.
    protected $guarded = ['id'];

    public function villager()
    {
        return $this->hasMany(Villager::class);
    }
}
