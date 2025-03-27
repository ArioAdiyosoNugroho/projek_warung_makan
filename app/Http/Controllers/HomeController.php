<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiWarung;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = InformasiWarung::first(); // Ambil data pertama
        $hariIni = Carbon::now()->locale('id')->translatedFormat('l'); // Nama hari dalam bahasa Indonesia
    
        // Konversi jam_operasional dari JSON ke array jika masih berbentuk string
        $jamOperasional = is_array($informasi->jam_operasional) ? $informasi->jam_operasional : json_decode($informasi->jam_operasional, true);
    
        // Ambil jam buka & tutup sesuai hari ini
        $jamBuka = $jamOperasional[$hariIni]['buka'] ?? null;
        $jamTutup = $jamOperasional[$hariIni]['tutup'] ?? null;
    
        // Jika kedua nilai null, tampilkan "Tutup"
        $jamBukaTutup = (!$jamBuka && !$jamTutup) ? 'Tutup' : "{$jamBuka} - {$jamTutup}";
        //untuk mengelompokkan jam operasional
        $groupedJam = $this->formatJamOperasional($jamOperasional);
    
        return view('Home.index', compact('informasi', 'hariIni', 'jamBukaTutup','groupedJam'));
        
    }
    //PUSING ANJEEERRRR😭

    public function formatJamOperasional($jamOperasional)
    {
        $hariIndonesia = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        $grouped = [];
        $lastJam = null;
        $tempGroup = [];
    
        foreach ($hariIndonesia as $hari) {
            if (!isset($jamOperasional[$hari])) continue; // Lewati jika hari tidak ada dalam data
        
            $buka = $jamOperasional[$hari]['buka'] ?? null;
            $tutup = $jamOperasional[$hari]['tutup'] ?? null;
            $jam = ($buka && $tutup) ? "{$buka} - {$tutup}" : "Tutup";
        
            if ($lastJam === null || $lastJam !== $jam) {
                // Jika jam operasional berubah, simpan grup sebelumnya dulu
                if (!empty($tempGroup)) {
                    $grouped[] = [
                        'hari' => $this->gabungkanHari($tempGroup),
                        'jam' => $lastJam
                    ];
                }
                // Mulai grup baru
                $tempGroup = [$hari];
                $lastJam = $jam;
            } else {
                // Jika jam operasional sama, tambahkan ke grup yang sama
                $tempGroup[] = $hari;
            }
        }
    
        // Tambahkan grup terakhir jika ada
        if (!empty($tempGroup)) {
            $grouped[] = [
                'hari' => $this->gabungkanHari($tempGroup),
                'jam' => $lastJam
            ];
        }
    
        return $grouped;
    }

// Fungsi bantu untuk menyusun format hari
private function gabungkanHari($hariArray)
{
    if (count($hariArray) === 1) {
        return $hariArray[0]; // Misal: "Senin"
    }
    return $hariArray[0] . '-' . end($hariArray); // Misal: "Senin-Rabu"
}





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
