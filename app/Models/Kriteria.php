<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'bobot',
    ];


    //getNilaiKriteria
    public function getNilaiKriteria()
    {
        return $this->hasMany(NilaiKriteria::class, 'id_kriteria', 'id');
    }

    use HasFactory;
}
