<?php

namespace App\Http\Controllers;

use App\Models\InformasiWarung;
use Illuminate\Http\Request;

class InformasiWarungController extends Controller
{
    public function showEdit()
    {
        $informasi = InformasiWarung::first(); // Ambil satu data saja
        return view('setting.setinfo', compact('informasi'));
    }

    public function update(Request $request)
{
    // Validasi data umum
    $request->validate([
        'nama_rumah_makan' => 'required|string|max:255',
        'contact' => 'required|string|max:20',
        'email' => 'required|email',
        'alamat' => 'required|string',
        'jam_operasional' => 'required|array', // Pastikan jam operasional ada
    ]);

    // Validasi jam buka dan tutup untuk setiap hari
    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    foreach ($hari as $day) {
        $request->validate([
            "jam_operasional.{$day}.buka" => 'required|date_format:H:i',
            "jam_operasional.{$day}.tutup" => 'required|date_format:H:i',
        ], [
            "jam_operasional.{$day}.buka.required" => "Jam buka untuk hari {$day} harus diisi.",
            "jam_operasional.{$day}.tutup.required" => "Jam tutup untuk hari {$day} harus diisi.",
            "jam_operasional.{$day}.buka.date_format" => "Format jam buka untuk hari {$day} salah, gunakan format HH:MM.",
            "jam_operasional.{$day}.tutup.date_format" => "Format jam tutup untuk hari {$day} salah, gunakan format HH:MM.",
        ]);
    }

    // Ambil data informasi rumah makan atau buat baru
    $informasi = InformasiWarung::firstOrNew([]);

    // Isi data yang lain
    $informasi->fill($request->except('jam_operasional'));

    // Simpan jam operasional
    $informasi->jam_operasional = $request->jam_operasional;

    // Simpan ke database
    $informasi->save();

    // Kembalikan dengan pesan sukses
    return redirect()->back()->with('success', 'Informasi berhasil diperbarui');
}


    
    
}
