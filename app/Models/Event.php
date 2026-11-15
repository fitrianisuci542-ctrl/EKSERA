<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'penyelenggara',
        'foto',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}