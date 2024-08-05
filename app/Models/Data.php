<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = [
        'id_pengajuan',
        'id_nilai_kriteria',
        'id_users',
    ];

      //getidpengajuan
      public function getPengajuan()
      {
          return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
      }

        //getidnilaikriteria
      public function getNilaiKriteria()
      {
          return $this->belongsTo(NilaiKriteria::class, 'id_nilai_kriteria', 'id');
      }

       //getidusers
       public function getUser()
       {
           return $this->belongsTo(User::class, 'id_users', 'id');
       }

      use HasFactory;
}
