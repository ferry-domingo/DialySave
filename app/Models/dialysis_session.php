<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dialysis_session extends Model
{
    use HasFactory;
     protected $fillable = [
        'patient_id', 'session_date', 'start_time', 'end_time',
        'dialysis_type', 'notes'
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

 public function vital_signs()
{
    return $this->hasMany(vital_sign::class, 'session_id');
}


    public function labResults()
    {
        return $this->hasMany(lab_result::class);
    }

    public function staff()
    {
        return $this->belongsToMany(User::class, 'session_staff');
    }
}
