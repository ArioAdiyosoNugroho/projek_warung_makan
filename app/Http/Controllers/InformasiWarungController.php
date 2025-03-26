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
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'alamat' => 'required'
        ]);

        $informasi = InformasiWarung::first();
        if (!$informasi) {
            $informasi = new InformasiWarung();
        }

        $informasi->fill($request->all());
        $informasi->save();

        return redirect()->back()->with('success', 'Informasi berhasil diperbarui');
    }
}

// // CRUD Controller untuk InformasiWarung
// namespace App\Http\Controllers;

// use App\Models\InformasiWarung;
// use Illuminate\Http\Request;

// class InformasiWarungController extends Controller
// {
//     public function index()
//     {
//         $informasi = InformasiWarung::all();
//         return view('informasi_warung.index', compact('informasi'));
//     }

//     public function showEdit()
//     {
//         $informasi = InformasiWarung::first(); // Ambil satu data saja
//         return view('setting.setinfo', compact('informasi'));
//     }

//     public function create()
//     {
//         return view('informasi_warung.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama_rumah_makan' => 'required',
//             'contact' => 'required',
//             'email' => 'required|email|unique:informasi_warungs',
//             'jam_buka' => 'required',
//             'jam_tutup' => 'required',
//             'alamat' => 'required'
//         ]);

//         InformasiWarung::create($request->all());
//         return redirect()->route('informasi_warung.index')->with('success', 'Informasi berhasil ditambahkan');
//     }

//     public function show(InformasiWarung $informasiWarung)
//     {
//         return view('informasi_warung.show', compact('informasiWarung'));
//     }

//     public function edit(InformasiWarung $informasiWarung)
//     {
//         return view('informasi_warung.edit', compact('informasiWarung'));
//     }

//     public function update(Request $request, InformasiWarung $informasiWarung)
//     {
//         $request->validate([
//             'nama_rumah_makan' => 'required',
//             'contact' => 'required',
//             'email' => 'required|email|unique:informasi_warungs,email,' . $informasiWarung->id,
//             'jam_buka' => 'required',
//             'jam_tutup' => 'required',
//             'alamat' => 'required'
//         ]);

//         $informasiWarung->update($request->all());
//         return redirect()->route('informasi_warung.index')->with('success', 'Informasi berhasil diperbarui');
//     }

//     public function destroy(InformasiWarung $informasiWarung)
//     {
//         $informasiWarung->delete();
//         return redirect()->route('informasi_warung.index')->with('success', 'Informasi berhasil dihapus');
//     }
// }
