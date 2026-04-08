<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tarif';
    protected $fillable = ['id_rac', 'prix_salarie', 'prix_auto'];  

    public function rac() {
        return $this->belongsTo(Racc::class, 'id_rac');
    }
}
