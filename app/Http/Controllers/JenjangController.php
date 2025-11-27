<?php

namespace App\Http\Controllers;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
     public function show()
 {
         // Ambil semua data dari table gender
    $jenjang = Jenjang::orderBy('tahun', 'ASC')->get();

    // Kirim ke view
    return view('admin.jenjang.index', compact('jenjang'));
 }
    public function create()
 {
    return view ('admin.jenjang.create');
 }

 public function store(Request $request)
 {
      $request->validate([
        'tahun' => 'required',
        'sekolah' => 'required',
        'presentase' => 'required',
    ]);

    Jenjang::create([
        'tahun' => $request->tahun,
        'sekolah' => $request->sekolah,
        'presentase' => $request->presentase
    ]);

    return redirect()->route('admin.jenjang.index')->with('success', "Data berhasil ditambahkan!");
 }

  public function edit($id){
       $jenjang = Jenjang::findOrFail($id);
        return view('admin.jenjang.edit', compact('jenjang'));

    }

     public function update(Request $request, $id){
        $request->validate([
        'tahun' => 'required|integer',
        'sekolah' => 'required|string',
        'presentase' => 'required|numeric',
    ]);

      $jenjang = Jenjang::findOrFail($id);

    $jenjang->update([
       'tahun' => $request->tahun,
        'sekolah' => $request->sekolah,
        'presentase' => $request->presentase,
    ]);

    return redirect()->route('admin.jenjang.index')->with('success', 'Provinsi berhasil diperbarui!');
    }

     public function destroy($id)
    {
    Jenjang::destroy($id);
    return redirect()->route('admin.jenjang.index')->with('success', 'Data berhasil dihapus!');
    }

}
