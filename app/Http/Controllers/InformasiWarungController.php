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
        $request->validate([
            'nama_rumah_makan' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'jam_operasional' => 'required|array', // Pastikan input berbentuk array
        ]);
    
        $informasi = InformasiWarung::firstOrNew([]);
        $informasi->fill($request->except('jam_operasional'));
        $informasi->jam_operasional = $request->jam_operasional; // Simpan sebagai JSON
        $informasi->save();
    
        return redirect()->back()->with('success', 'Informasi berhasil diperbarui');
    }

    
    
}
