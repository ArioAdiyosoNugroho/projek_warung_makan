<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // Menambahkan kolom yang bisa diisi
    protected $fillable = [
        'name',  
    ];

    // Relasi ke model Menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
