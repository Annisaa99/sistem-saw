<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nasabah extends Model
{
    protected $table = 'nasabah';

    protected $fillable = [
        'nama',
        'no_ktp',
        'alamat',
        'no_telp',
        'jenis_kelamin',
    ];

    use HasFactory;
}
