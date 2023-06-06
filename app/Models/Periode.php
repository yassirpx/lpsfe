<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Element;
use App\Models\Semestre;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = [
        'idper',
        'debutperi',
         'finperi',
         'idele',
         'ids',
    ];
    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function semestre()
    {
        return $this->belongsto(Semestre::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
