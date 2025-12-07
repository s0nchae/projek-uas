<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
     public function show()
 {
         // Ambil semua data dari table gender
    $provinsi = Provinsi::orderBy('tahun', 'ASC')->get();

    // Kirim ke view
    return view('admin.provinsi.index', compact('provinsi'));
 }

 public function create()
 {
    return view ('admin.provinsi.create');
 }

 public function store(Request $request)
 {
      $request->validate([
        'tahun' => 'required|integer|after_or_equal:2000|max:2099|digits:4',
        'nama' => 'required| string|regex:/^[a-zA-Z ]+$/',
        'desimal' => 'required|numeric|max:100|min:0.1',
    ]);

    Provinsi::create([
        'tahun' => $request->tahun,
        'nama' => $request->nama,
        'desimal' => $request->desimal
    ]);

    return redirect()->route('admin.provinsi.index')->with('success', "Data berhasil ditambahkan!");
 }

  public function edit($id){
       $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit', compact('provinsi'));

    }

     public function update(Request $request, $id){
        $request->validate([
        'tahun' => 'required|integer|after_or_equal:2000|max:2099|digits:4',
        'nama' => 'required|string|regex:/^[a-zA-Z ]+$/',
        'desimal' => 'required|numeric|max:100|min:0.1',
    ]);

      $provinsi = Provinsi::findOrFail($id);

    $provinsi->update([
       'tahun' => $request->tahun,
        'nama' => $request->nama,
        'desimal' => $request->desimal,
    ]);

    return redirect()->route('admin.provinsi.index')->with('success', 'Provinsi berhasil diperbarui!');
    }

     public function destroy($id)
    {
    Provinsi::destroy($id);
    return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil dihapus!');
    }
}
