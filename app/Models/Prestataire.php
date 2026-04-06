<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $table = 'prestataire';

    public $timestamps = false;

    protected $fillable = [
        'nom'
    ];
}
