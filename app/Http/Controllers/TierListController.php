<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TierList;

class TierListController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'tier_merokok' => 'required',
            'tier_dampak' => 'required',
        ]);

        TierList::create([
            'tier_merokok' => is_array($validated['tier_merokok'])
                                ? json_encode($validated['tier_merokok'])
                                : $validated['tier_merokok'],
            'tier_dampak'  => is_array($validated['tier_dampak'])
                                ? json_encode($validated['tier_dampak'])
                                : $validated['tier_dampak'],
        ]);

        return redirect()->back()->with('success', 'Tier list berhasil disimpan!');
    }

    public function dashboard()
    {
        $all = TierList::all();

        $countsMerokok = [];
        foreach ($all as $item) {
            $data = json_decode($item->tier_merokok, true);

            if (is_array($data) && isset($data['S'])) {
                foreach ($data['S'] as $reason) {
                    $countsMerokok[$reason] = ($countsMerokok[$reason] ?? 0) + 1;
                }
            }
        }


        arsort($countsMerokok);
        $topS = !empty($countsMerokok) ? key($countsMerokok) : null;


        return view('dashboard', compact('topS'));
    }
}
