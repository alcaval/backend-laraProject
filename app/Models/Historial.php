<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';

    /**
     * The attributes that are mass assignable.$table->id();
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'cod',
        'loc',
        'fIngreso',
        'fAlta',
        'fReingreso',
        'edad',
        'sexo',
        'tipo',
        'NDA',
        'NPA',
        'user'
    ];
}
