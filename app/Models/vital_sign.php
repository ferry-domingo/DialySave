<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vital_sign extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'blood_pressure',
        'heart_rate',
        'respiratory_rate',
        'temperature',
        'weight_before',
        'weight_after'
    ];

    public function session()
    {
        return $this->belongsTo(dialysis_session::class, 'session_id');
    }


}
