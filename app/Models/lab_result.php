<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lab_result extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'hemoglobin',
        'creatinine',
        'potassium',
        'remarks'
    ];
    public function session()
    {
        return $this->belongsTo(dialysis_session::class, 'session_id');
    }
}
