<?php

namespace App\Http\Controllers;
use App\Models\Usia;
use Illuminate\Http\Request;

class UsiaController extends Controller
{
     public function show()
 {
         // Ambil semua data dari table gender
    $usia = Usia::orderBy('tahun', 'ASC')->get();

    // Kirim ke view
    return view('admin.usia.index', compact('usia'));
 }

 public function create()
 {
    return view ('admin.usia.create');
 }

 public function store(Request $request)
 {
     $request->validate([
        'tahun' => 'required',
        'umur' => 'required',
        'presentase' => 'required',
    ]);

    Usia::create([
        'tahun' => $request->tahun,
        'umur' => $request->umur,
        'presentase' => $request->presentase,
    ]);

    return redirect()->route('admin.usia.index')->with('success', "Data berhasil ditambahkan!");
 }

   public function update(Request $request, $id){
        $request->validate([
        'tahun' => 'required|integer',
        'umur' => 'required|string',
        'presentase' => 'required|numeric',
    ]);

      $usia = Usia::findOrFail($id);

    $usia->update([
       'tahun' => $request->tahun,
        'umur' => $request->umur,
        'presentase' => $request->presentase,
    ]);

    return redirect()->route('admin.usia.index')->with('success', 'Usia berhasil diperbarui!');
    }

    public function edit($id){
       $usia = Usia::findOrFail($id);
        return view('admin.usia.edit', compact('usia'));

    }

     public function destroy($id)
    {
    Usia::destroy($id);
    return redirect()->route('admin.usia.index')->with('success', 'Data berhasil dihapus!');
    }
}
