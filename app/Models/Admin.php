<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nama',
        'tanggal_dibuat',
        'tanggal_kadaluarsa',
        'total_peserta',
        'lokasi_event',
        'passcode',
        'teamsix',
    ];
    use HasFactory;
}
