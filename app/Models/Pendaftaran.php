<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ekskul;
use App\Models\User;

class Pendaftaran extends Model
{
    protected $fillable = [
        'user_id',
        'ekskul_id',
        'status',
        'catatan',
    ];

    // Relasi ke ekstrakurikuler
    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class);
    }

    // Relasi ke akun siswa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}