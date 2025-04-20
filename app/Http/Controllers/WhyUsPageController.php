<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiWarung;
use App\Models\About;
use App\Models\WhyUs;
use Carbon\Carbon;

class WhyUsPageController extends Controller
{
    /**
     * Menampilkan halaman Read Why Us dengan semua data.
     */
    public function index()
    {
        $WhyUs = WhyUs::orderBy('created_at', 'desc')->get(); // Ambil semua data
        $abouts = About::all();
        $informasi = InformasiWarung::first(); // Ambil data pertama
        $hariIni = Carbon::now()->locale('id')->translatedFormat('l'); // Nama hari dalam bahasa Indonesia

        // Validasi jika $informasi null
        if (!$informasi) {
            $jamOperasional = [];
            $jamBukaTutup = 'Tutup';
            $groupedJam = [];
        } else {
            // Konversi jam_operasional dari JSON ke array jika masih berbentuk string
            $jamOperasional = is_array($informasi->jam_operasional) ? $informasi->jam_operasional : json_decode($informasi->jam_operasional, true);

            // Ambil jam buka & tutup sesuai hari ini
            $jamBuka = $jamOperasional[$hariIni]['buka'] ?? null;
            $jamTutup = $jamOperasional[$hariIni]['tutup'] ?? null;

            // Jika kedua nilai null, tampilkan "Tutup"
            $jamBukaTutup = (!$jamBuka && !$jamTutup) ? 'Tutup' : "{$jamBuka} - {$jamTutup}";

            // Untuk mengelompokkan jam operasional
            $groupedJam = $this->formatJamOperasional($jamOperasional);
        }

        return view('Read.readWhyUs', compact('informasi', 'hariIni', 'jamBukaTutup', 'groupedJam', 'abouts', 'WhyUs'));
    }

    /**
     * Fungsi untuk mengelompokkan jam operasional.
     */
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
                // Jika jam operasional berubah, simpan grup sebelumnya dulu ygy
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

    /**
     * Fungsi bantu untuk menyusun format hari.
     */
    private function gabungkanHari($hariArray)
    {
        if (count($hariArray) === 1) {
            return $hariArray[0]; // Misal: "Senin"
        }
        return $hariArray[0] . '-' . end($hariArray); // Misal: "Senin-Rabu"
    }
}
