<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dialysis_session extends Model
{
    use HasFactory;
    protected $fillable = [
        'or_number',
        'patient_id',
        'session_date',
        'start_time',
        'end_time',
        'dialysis_type',
        'notes'
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function vital_sign()
    {
        return $this->hasOne(vital_sign::class, 'session_id');
    }

    public function lab_result()
    {
        return $this->hasOne(lab_result::class,'session_id');
    }

    public function staff()
    {
        return $this->belongsToMany(User::class, 'session_staff');
    }
}
