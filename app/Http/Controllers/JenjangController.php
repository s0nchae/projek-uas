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
        'tahun' => 'required|integer|integer|digits:4|after_or_equal:2000|max:2099',
        'sekolah' => 'required|string|regex:/^[a-zA-Z ]+$/',
        'presentase' => 'required|numeric|max:100|min:0.1',
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
        'tahun' => 'required|integer|digits:4|after_or_equal:2000|max:2099',
        'sekolah' => 'required|string|regex:/^[a-zA-Z ]+$/',
        'presentase' => 'required|numeric|max:100|min:0.1',
    ]);

      $jenjang = Jenjang::findOrFail($id);

    $jenjang->update([
       'tahun' => $request->tahun,
        'sekolah' => $request->sekolah,
        'presentase' => $request->presentase,
    ]);

    return redirect()->route('admin.jenjang.index')->with('success', 'Jenjang berhasil diperbarui!');
    }

     public function destroy($id)
    {
    Jenjang::destroy($id);
    return redirect()->route('admin.jenjang.index')->with('success', 'Data berhasil dihapus!');
    }

}
