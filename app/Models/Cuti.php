<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'tabel_cuti';

    public $timestamps = false;

    public function karyawan()
    {
        return $this->belongsTo(\App\Models\Karyawan::class, 'nomor_induk', 'nomor_induk');
    }
}
