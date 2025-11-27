<?php

namespace App\Http\Controllers;
use App\Models\Ekonomi;
use Illuminate\Http\Request;

class EkonomiController extends Controller
{
     public function show()
    {

        // Ambil semua data dari table gender
        $ekonomi = Ekonomi::orderBy('tahun', 'ASC')->get();

        // Kirim ke view
        return view('admin.ekonomi.index', compact('ekonomi'));
    }

    public function create()
 {
    return view ('admin.ekonomi.create');
 }

 public function store(Request $request)
 {
      $request->validate([
        'tahun' => 'required',
        'kelas' => 'required',
        'orang' => 'required',
        'presentase' => 'required'
    ]);

    Ekonomi::create([
        'tahun' => $request->tahun,
        'kelas' => $request->kelas,
        'orang' => $request->orang,
        'presentase' => $request->presentase
    ]);

    return redirect()->route('admin.ekonomi.index')->with('success', "Data berhasil ditambahkan!");
 }

  public function edit($id){
       $ekonomi = Ekonomi::findOrFail($id);
        return view('admin.ekonomi.edit', compact('ekonomi'));

    }

     public function update(Request $request, $id){
        $request->validate([
        'tahun' => 'required|integer',
        'kelas' => 'required|string',
        'orang' => 'required|numeric',
        'presentase' => 'required|numeric'
    ]);

      $ekonomi = Ekonomi::findOrFail($id);

    $ekonomi->update([
       'tahun' => $request->tahun,
        'kelas' => $request->kelas,
        'orang' => $request->orang,
        'presentase' => $request->presentase,
    ]);

    return redirect()->route('admin.ekonomi.index')->with('success', 'Provinsi berhasil diperbarui!');
    }

     public function destroy($id)
    {
    Ekonomi::destroy($id);
    return redirect()->route('admin.ekonomi.index')->with('success', 'Data berhasil dihapus!');
    }
}
