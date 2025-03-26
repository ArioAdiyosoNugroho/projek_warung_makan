<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiWarung extends Model
{
    protected $table = 'informasi_warung';

    protected $fillable = [
        'nama_rumah_makan',
        'contact',
        'email',
        'jam_buka',
        'jam_tutup',
        'alamat',
    ];
}
