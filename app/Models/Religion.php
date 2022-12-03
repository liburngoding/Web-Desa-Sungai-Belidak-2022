<?php

namespace App\Models;

use App\Models\Villager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Religion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function villager()
    {
        return $this->hasMany(Villager::class);
    }
}
