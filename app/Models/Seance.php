<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Periode;

class Seance extends Model
{
    use HasFactory;


    protected $fillable = [
        
        'idsea',
        'nomsea',
        'daysean',
        'debutsean',
         'finsean',
         'nsean',
         'idper',
         
         
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
