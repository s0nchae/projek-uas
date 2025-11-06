<?php

namespace App\Http\Controllers;

use App\Models\Kalkulator;  
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function dashboard()
    {
        $kalkulators = Kalkulator::latest()->get();
        $totalUang = Kalkulator::sum('total_uang');
        return view('dashboard', compact('kalkulators', 'totalUang'));
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'bungkus_per_hari' => 'required|integer|min:1',
            'harga_per_bungkus' => 'required|integer|min:1000',
            'lama_bulan_merokok' => 'required|integer|min:1',
        ]);

        $bungkus_per_hari = $validated['bungkus_per_hari'];
        $harga_per_bungkus = $validated['harga_per_bungkus'];
        $lama_bulan_merokok = $validated['lama_bulan_merokok'];
        
        $total_per_hari = $bungkus_per_hari * $harga_per_bungkus;
        $total_per_bulan = $total_per_hari * 30;
        $total_uang = $total_per_bulan * $lama_bulan_merokok;

        Kalkulator::create([
            'bungkus_per_hari' => $bungkus_per_hari,
            'harga_per_bungkus' => $harga_per_bungkus,
            'lama_bulan_merokok' => $lama_bulan_merokok,
            'total_per_hari' => $total_per_hari,
            'total_per_bulan' => $total_per_bulan,
            'total_uang' => $total_uang,
        ]);

        // FIXED: Proper syntax
        return redirect(route('dashboard') . '#Kalkulator')->with([
            'success' => 'Kalkulasi berhasil!',
            'calculation_result' => [
                'total_per_hari' => $total_per_hari,
                'total_per_bulan' => $total_per_bulan,
                'total_uang' => $total_uang,
            ]
        ]);
    }

    public function clearHistory($id)
    {
        $kalkulator = Kalkulator::findOrFail($id);
        $kalkulator->delete();

        // FIXED: Proper syntax
        return redirect(route('dashboard') . '#Kalkulator')->with('success', 'Riwayat berhasil dihapus!');
    }
}