<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    protected $table = 'nilaikriteria';

    
    protected $fillable = [
        'id_kriteria',
        'nama',
        'nilai',
    ];

    //getKriteria
    public function getKriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id');
    }

    use HasFactory;
}
