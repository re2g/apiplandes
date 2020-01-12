<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposiciones extends Model
{
    protected $table = 'proposiciones';
    protected $fillable =   [
                                'identificacion',
                                'nombre',
                                'email',
                                'telefono',
                                'ejes',
                                'problema',
                                'solucion',
                                'video',
                            ];
}
