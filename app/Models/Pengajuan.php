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
        'id_users',
    ];

    //getnasabah
    public function getNasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah', 'id');
    }

    //check data
    public function getData()
    {
        return $this->hasMany(Data::class, 'id_pengajuan', 'id');
    }

    //is data exist
    public function isDataExist()
    {
        return $this->getData->count() > 0;
    }

    use HasFactory;
}
