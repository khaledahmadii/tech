<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = 'intervention';

    public $timestamps = false;

    protected $fillable = [
        'technicien',
        'num_int',
        'type_rac',
        'jeton',
        'heure',
        'notre',
        'valid',
        'date_int'
    ];

    protected $dates = ['date_int'];

    // Relationship with User (assuming technicien is foreign key to users)
    public function technicien()
    {
        return $this->belongsTo(User::class, 'technicien');
    }

    // Relationship with Racc
    public function racc()
    {
        return $this->belongsTo(Racc::class, 'type_rac');
    }
}
