<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'model',
        'marque',
        'last_maintenance',
        'nb_kilometrage',
        'nb_serie',
        // 'status_id', //à rajouter plus tard
        // 'fournisseur_id',
        // 'agence_id'
    ];
}
