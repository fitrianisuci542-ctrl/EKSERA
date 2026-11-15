<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Pembina;
use App\Models\Pendaftaran;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke data pembina
    public function pembina()
    {
        return $this->hasOne(Pembina::class);
    }

    // Relasi ke pendaftaran ekstrakurikuler
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}