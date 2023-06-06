<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Niveau;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'idfil',
        'nomfil',
        'idfor'
    ];
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function niveaux()
    {
        return $this->hasMany(Niveau::class);
    }
}
