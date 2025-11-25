<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session_staff extends Model
{
    use HasFactory;
    protected $table = 'session_staff';

    protected $fillable = ['session_id', 'user_id'];
    public function session()
    {
        return $this->belongsTo(dialysis_session::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
