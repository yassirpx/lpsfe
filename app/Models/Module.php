<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semestre;
use App\Models\Element;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'idm',
        'nommodel',
         'ids'
    ];
    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
