<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Niveau;
use App\Models\Module;


class Semestre extends Model
{

    protected $fillable = [
        'ids',
        'nomsem',
         'idn'
    ];
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
    
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
