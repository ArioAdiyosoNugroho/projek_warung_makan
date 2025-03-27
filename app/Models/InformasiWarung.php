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
        'jam_operasional',
        'alamat',
    ];
    protected $casts = [
        'jam_operasional' => 'array',
    ];

    public function getFormattedContactAttribute()
    {
        if (!$this->contact) {
            return null;
        }

        // Ubah awalan 0 ke +62 (tambahkan spasi setelah +62)
        $nomor = preg_replace('/^0/', '+62 ', $this->contact);

        // Tambahkan strip (-) setiap 4 digit setelah +62
        return preg_replace('/(\d{4})(?=\d)/', '$1-', $nomor);
    }
    
}
