<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id');
    }
}
