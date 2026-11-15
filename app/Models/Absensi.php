<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;
use App\Models\User;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = [
        'pendaftaran_id',
        'pembina_id',
        'tanggal',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi ke pendaftaran siswa
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // Relasi ke pembina
    public function pembina()
    {
        return $this->belongsTo(User::class, 'pembina_id');
    }
}