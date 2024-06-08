<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'id_nasabah',
        'tanggal_pengajuan',
        'status_pengajuan',
        'plafon',
        'keterangan',
        'tanggal_validasi',
    ];

    //getnasabah
    public function getNasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah', 'id');
    }
    
    use HasFactory;
}
