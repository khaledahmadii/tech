<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Racc extends Model
{
    protected $table = 'racc';

    public $timestamps = false;

    protected $fillable = [
        'nom',
    ];
}
