<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use App\Models\Professeur;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'idel',
        'nomelement',
        'idm',
        'idp'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

}
