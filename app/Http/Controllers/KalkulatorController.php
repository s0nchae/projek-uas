<?php

namespace App\Http\Controllers;

use App\Models\Kalkulator;
use App\Models\TierList;
use App\Models\video;
use App\Models\Gender;
use App\Models\Usia;
use App\Models\Jenjang;
use App\Models\Ekonomi;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function dashboard()
    {
        $kalkulators = Kalkulator::latest()->get();
        $totalUang = Kalkulator::sum('total_uang');

        $all = TierList::all();

        // ======== FIX VIDEO ========
        $mainVideo = Video::first();
        $otherVideos = Video::skip(1)->take(10)->get();
        $gender = Gender::all();
        $usia = Usia::all();
        $jenjang = Jenjang::all();
        $ekonomi = Ekonomi::all();
        $provinsi = Provinsi::all();
        // ============================

        $countsMerokok = [];
        foreach ($all as $item) {
            $data = json_decode($item->tier_merokok, true);
            if (isset($data['S'])) {
                foreach ($data['S'] as $reason) {
                    $countsMerokok[$reason] = ($countsMerokok[$reason] ?? 0) + 1;
                }
            }
        }
        arsort($countsMerokok);
        $topS = key($countsMerokok);

        $countsDampak = [];
        foreach ($all as $item) {
            $data = json_decode($item->tier_dampak, true);
            if (isset($data['S'])) {
                foreach ($data['S'] as $effect) {
                    $countsDampak[$effect] = ($countsDampak[$effect] ?? 0) + 1;
                }
            }
        }
        arsort($countsDampak);
        $topDampak = key($countsDampak);

        return view('dashboard', compact('kalkulators', 'totalUang', 'topS', 'topDampak', 'mainVideo', 'otherVideos', 'gender','usia','jenjang','ekonomi','provinsi'));
    }

    public function calculate(Request $request)
{
    // Validate input
    $request->validate([
        'bungkus_per_hari' => 'required|numeric|min:1',
        'harga_per_bungkus' => 'required|numeric|min:1000',
        'lama_bulan_merokok' => 'required|numeric|min:1',
    ]);

    // Get input values
    $bungkus_per_hari = $request->input('bungkus_per_hari');
    $harga_per_bungkus = $request->input('harga_per_bungkus');
    $lama_bulan_merokok = $request->input('lama_bulan_merokok');

    // Calculate totals
    $total_per_hari = $bungkus_per_hari * $harga_per_bungkus;
    $total_per_bulan = $total_per_hari * 30;
    $total_uang = $total_per_bulan * $lama_bulan_merokok;

    // Save to database
    Kalkulator::create([
        'bungkus_per_hari' => $bungkus_per_hari,
        'harga_per_bungkus' => $harga_per_bungkus,
        'lama_bulan_merokok' => $lama_bulan_merokok,
        'total_per_hari' => $total_per_hari,
        'total_per_bulan' => $total_per_bulan,
        'total_uang' => $total_uang,
    ]);

    // Return with result
    return redirect()->back()->with('calculation_result', [
        'total_per_hari' => $total_per_hari,
        'total_per_bulan' => $total_per_bulan,
        'total_uang' => $total_uang,
    ]);
}

    public function clearHistory($id)
    {
        $kalkulator = Kalkulator::findOrFail($id);
        $kalkulator->delete();

        return redirect()->route('dashboard')->with('success', 'Riwayat berhasil dihapus!');
    }
}
