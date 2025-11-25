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

    public function dialysisSessions()
    {
        return $this->hasMany(dialysis_session::class);
    }
}
