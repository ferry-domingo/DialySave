<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'birthdate',
        'gender',
        'address',
        'contact_no',
        'emergency_contact',
        'blood_type',
        'medical_conditions',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(dialysis_session::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    protected static function boot()
    {
    parent::boot();

    static::created(function ($patient) {

        // PREFIX (Pwede mong palitan, sample: D)
        $prefix = 'D';

        // Make padded number based sa auto-increment ID
        $generated = $prefix . str_pad($patient->id, 7, '0', STR_PAD_LEFT);
        // Example: D0000001

        // Save PID
        $patient->patient_id = $generated;
        $patient->save();
    });
    }

}
