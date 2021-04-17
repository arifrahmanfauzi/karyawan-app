<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class KaryawanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'no' => $this->no,
            'nomor_induk' => $this->nomor_induk,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'tanggal_lahir' => Carbon::parse($this->tanggal_lahir)->format('d-M-y'),
            'tanggal_bergabung' => Carbon::parse($this->tanggal_bergabung)->format('d-M-y'),
            'cuti' => $this->cuti
        ];
    }
}
