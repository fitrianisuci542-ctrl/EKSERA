<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pembina extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_hp',
        'bidang',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}