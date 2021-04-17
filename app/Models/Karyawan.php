<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'tabel_karyawan';

    protected $primaryKey = 'no';

    public $timestamps = false;

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('d-b-y');
    // }

    
    // public function setDoAttribute($value)
    // {
    //     $this->attributes['tanggal_lahir'] =  Carbon::createFromFormat('j F, Y', $value)->toDateString();
    // }
        
    protected $cast = [
            'tanggal_lahir' => 'date:d-b-y',
            'tanggal_bergabung' =>  'date:d-b-y'
        ];
    
    public function cuti()
    {
        return $this->hasMany(\App\Models\Cuti::class, 'nomor_induk', 'nomor_induk');
    }
}
